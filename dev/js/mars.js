const scaling = "tag"; // this will resize to fit inside the screen dimensions
const width = 1024;
const height = 768;
const color = "#0c0d18";
const outerColor = "#0c0d18";
const assets = "mars-map.jpg";
const path = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/";
const waiter = new Waiter({corner:0, backgroundColor:blue});

const frame = new Frame(scaling, width, height, color, outerColor, assets, path, waiter);
frame.on("ready", ()=>{ // ES6 Arrow Function - similar to function(){}
    zog("ready from ZIM Frame"); // logs in console (F12 - choose console)

    // often need below - so consider it part of the template
    let stage = frame.stage;
    let stageW = frame.width;
    let stageH = frame.height;

    // REFERENCES for ZIM at http://zimjs.com
    // see http://zimjs.com/learn.html for video and code tutorials
    // see http://zimjs.com/docs.html for documentation
    // see https://www.youtube.com/watch?v=pUjHFptXspM for INTRO to ZIM
    // see https://www.youtube.com/watch?v=v7OT0YrDWiY for INTRO to CODE


    // CODE HERE

    // we will use ThreeJS to show the planet and ZIM to do interface
    // ZIM has a helper module for ThreeJS called three.js that makes it easy!

	const outerSpace = new Three({
		frame:frame,
		width:stageW,
		height:stageH,
        // pull camera out perpendicular from monitor 400
		cameraPosition:new THREE.Vector3(0, 0, 400)
	});

	if (outerSpace.success) { // otherwise no WebGL

		const scene = outerSpace.scene;
		const camera = outerSpace.camera;

		var planet;
        var swiper;
		const loader = new THREE.TextureLoader();
		loader.load(path+assets, texture=>{

            // MESH
			const geometry = new THREE.SphereGeometry(200, 40, 40);
			const material = new THREE.MeshLambertMaterial({map: texture});
			planet = new THREE.Mesh(geometry, material);
            // ThreeJS use x, y and z on position and rotation properties
            planet.position.x = 30;
			scene.add(planet);

            // LIGHT
            // MeshLambertMaterial needs to have light to see it
            // MeshBasicMaterial does not - but then you don't get shading
            // You could also add AmbientLight but we don't need it...
            // Move the light around in x, y, z to get the desired effect
            // set() is a way to do x, y, z all at once
    		const light = new THREE.PointLight(white);
    		light.position.set(-500,550,800);
    		scene.add(light);

            // ZIM Swiper for rotating planet when swiping on stage
            // rotation is in radians (small)
            swiper = new Swiper(stage, planet.rotation, "y", .002);
            // below would let you zoom in and out based on vertical swiping
            // new Swiper(stage, planet.position, "z", 2, false, -400, 0);

            // start the planet off rotating but then move to swiper when stage is pressed
            // assign the Ticker call to a variable to be able to remove it later
    		const rotate = Ticker.add(()=>{
    			planet.rotation.y -= .001;
    		});

            // "stagemousedown" is whole stage - "mousedown" is only on an object on the stage
            swiper.on("swipeup", ()=>{
                Ticker.remove(rotate);         
				// the swiper is expecting the rotation to start at 0
				// so set it immediately to the last animated rotation
				swiper.immediate(planet.rotation.y);
				start();
            }, null, true); // true to call function only once then remove event
			
		});

        function start() {          

            // ThreeJS sits on top of the first ZIM Frame's stage
            // Add a second frame on top of the ThreeJS for interface
            // The stage will be transparent if no color is set
            // nextFrame will pass event through to the next ZIM Frame
            // Note: you can't interact with ThreeJS and ZIM at the same time
            const frame2 = new Frame({
                scaling:scaling,
                width:width,
                height:height,
                nextFrame:frame
            });

            frame2.on("ready", ()=>{
                let stage = frame2.stage;
                let stageW = frame2.width;
                let stageH = frame2.height;

                // Here is the data for the List and tips
                // NOTE: this data is not real - but could be ;-)
                // See the commented out area below on how we made this data - it took 5 minutes...
                const craters = ["塔爾西斯太空站", "奧林帕斯山", "反射谷", "子午線灣", "羚羊峽谷", "雪花谷", "七彩河", "墨里安海", "太陽湖", "塞任海", "奧林匹克雪原", "克律塞平原", "地勒尼安海", "埃里亞高地", "阿拉伯台地"]
                const data = [[-0.51,296.19],[-1.42,180.74],[-1.93,544.98],[-2.59,133.58],[-2.95,481.56],[-3.9,214.89],[-4.25,502.7],[-5.27,523.84],[-5.81,170.98],[-5.94,367.74],[-6.48,143.34],[-7.7,180.74],[-8.23,538.48],[1.02,522.22],[0.48,175.86]]

                var tipTimeout;
                const list = new List({
                    list:craters
                })
                    // make sure we specify this stage otherwise it gets put on the first stage
                    // and we will not have updated that first stage at this time
                    // so if we left off stage, when working in the second stage, we would not see the list
                    // SUMMARY - when working on a stage other than the first stage,
                    // we have to specify the stage for things like center(), loc(), pos(), Ticker.add(), Pane(), Grid(), etc.
                    .pos(30,100,null,null,stage)
                    .alp(0)
                    .animate({alpha:.5}, 700)

                    // using tap instead of change so can locate current selection again if needed
                    .tap(()=>{
                        // we do not want to rotate planet more than 360 degrees to get to data
                        // so set the planet to the modulus of 360 immediately in Swiper
                        // this means the Swiper will set the rotation the modulus and not damp to it
                        swiper.immediate(planet.rotation.y%(2*Math.PI));
                        // now damp to the desired location to animate the planet
                        // we could use ZIM animate() but for ThreeJS we need to set up a proxy object
                        // which is a few extra steps... so we just use the swiper
                        swiper.desiredValue = data[list.selectedIndex][0]; // rotation data

                        // The swiper does have a "swipestop" event but only when there is a min and max
                        // so without a min and max, we will just set a timeout
                        // but clear any previous timeout calls just in case
                        // this is why we declared tipTimeout outside the tap function
                        // so the next time we tap, we can clear it
                        // alternatively, we could have removed the tap event until the timeout has completed
                        // This type of event manipulation is often present in Interactive Media
                        // we have been doing it since Macromedia Director back in the nineties
                        if (tipTimeout) tipTimeout.clear();
                        tipTimeout = timeout(800, ()=>{
                            // make a tip with the list text and the y data
                            // makeTip is a custom function with a Circle and a Tip (an auto positioned Label)
                            makeTip(list.text, data[list.selectedIndex][1]);
                        });
                    });

                // start the List off with no selection
                list.selectedIndex = -1;

                function makeTip(text, y) {

                    // we could use clear or null instead of faint
                    // but we are going to drag the circle around to create the data
                    // clear or null would not let us drag the middle of the circle
                    // just left this in there for demonstration - would normally set to null
                    let circle = new Circle(50, faint, white, 2)
                        .center(stage)
                        .mov(35) // shift over in the x to match planet center
                        .loc(null, y-10) // apply the y data
                        .alp(0)
                        .animate({alpha:1}, 500)
                        // .drag({all:true}); // drag was set to record y position

                    // // used for recording rotation and y position for tips
                    // new Circle(10, null, white, 2).center(circle);
                    // stage.on("stagemouseup", () => {
                    //     circle.x = stageW/2+48; // force the x position - could set boundary on drag
                    //     zog("[" + decimals(planet.rotation.y,2) + "," + decimals(circle.y,2) + "]");
                    // });

                    let tip = new Tip({
                        text:text,
                        backgroundColor:white,
                        color:black,
                        shadowColor:-1,
                        outside:true, // outside the circle
                        target:circle,
                        align:"center",
                        valign:"bottom",
                        margin:14,
                        corner:0,
                        size:20
                    }).alp(0).show(null,1000000000).animate({alpha:.6}, 500);

                    // remove the tip on stagemousedown
                    // could reuse the tip, etc. but it is tricky to properly center an edited tip
                    // so just rebuild it all in the function
                    // NOTE: this was commented out to record data
                    stage.on("stagemousedown", ()=>{
                        tip.dispose();
                        circle.removeFrom();
                    }, null, true); // only once
                }
                // makeTip(); // used for recording data

            }); // end frame2 ready

        } // end start function when stage first pressed

	} // end ThreeJS model in place

	// Label is on first stage
    // new Label({text:"ZIM with ThreeJS", color:white}).alp(.8).sca(.8).pos(30,30); 
    stage.update();
	
	  
    // FOOTER
    // Please see a greeting message - then come visit us at ZIM https://zimjs.com
	// createGreet();
	
    // call remote script to make ZIM Foundation for Creative Coding icon
    // createIcon(); 

    // DOCS FOR ITEMS USED
	// https://zimjs.com/docs.html?item=Frame
	// https://zimjs.com/docs.html?item=Circle
	// https://zimjs.com/docs.html?item=Label
	// https://zimjs.com/docs.html?item=Tip
	// https://zimjs.com/docs.html?item=Waiter
	// https://zimjs.com/docs.html?item=List
	// https://zimjs.com/docs.html?item=tap
	// https://zimjs.com/docs.html?item=drag
	// https://zimjs.com/docs.html?item=animate
	// https://zimjs.com/docs.html?item=pos
	// https://zimjs.com/docs.html?item=loc
	// https://zimjs.com/docs.html?item=mov
	// https://zimjs.com/docs.html?item=alp
	// https://zimjs.com/docs.html?item=sca
	// https://zimjs.com/docs.html?item=removeFrom
	// https://zimjs.com/docs.html?item=center
	// https://zimjs.com/docs.html?item=Grid
	// https://zimjs.com/docs.html?item=Swiper
	// https://zimjs.com/docs.html?item=timeout
	// https://zimjs.com/docs.html?item=decimals
	// https://zimjs.com/docs.html?item=zog
	// https://zimjs.com/docs.html?item=Ticker



}); // end of frame ready
// import * as THREE from '/node_modules/three/build/three.module.js';
import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.117.1/build/three.module.js';
import {OrbitControls} from 'https://cdn.skypack.dev/three@0.120.0/examples/jsm/controls/OrbitControls.js';

// *DATA IMPORT
// let data = [];
// let xhttp = new XMLHttpRequest();
// xhttp.onreadystatechange = function(){
//     if (this.readyState == 4 && this.status == 200){
//         let response = JSON.parse(xhttp.responseText);
//         let output = Object.values(response);
//         for (let i = 0; i < output.length; i++){
//             data.push(output[i]);
//         }
//     }
// };
// xhttp.open("GET", "../DATA/Final_data.json", false)
//if false, data will till pressing button
// xhttp.send();
// console.log(data);


// *THREEJS CODE

// *CREATE scene where objects will be placed (kinda like a stage)
const scene = new THREE.Scene();

// *CREATE camera to see objects (kinda like sittin in the audience)
const camera = new THREE.PerspectiveCamera(75, window.innerWidth/window.innerHeight, 0.1, 1000);
    // perspectiveCamera( fov : Number, aspect : Number, near : Number, far : Number )

// *CREATE renderer to display the created objects (kind like the ppl who place the different sets on the stage)
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth/2, window.innerHeight/2);
document.body.appendChild(renderer.domElement);

// *CREATE controls so that we can interact with the objects/have interactivity
const controls = new OrbitControls(camera, renderer.domElement);


    // Create a scene -> this is only a green cube 
// let geometry = new THREE.BoxGeometry();
// let material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );
// let cube = new THREE.Mesh( geometry, material );
// scene.add( cube );
// camera.position.z = 5; //default (0,0,0)

// *CREATE earth
    // Earthmap is used for the basic texture which has the various continent/countries/etc on it
let earthMap = new THREE.TextureLoader().load('../img/3dplanet/8k_mars.jpeg');

    // EarthBumpMap is used to give the texture some "depth" so it's more appealing on eyes and data visuals
// let earthBumpMap = new THREE.TextureLoader().load('../img/3dplanet/earthbump4k.jpg');

    // EarthSpecMap gives the earth some shininess to the environment, allowing reflectivity off the light
// let EarthSpecMap = new THREE.TextureLoader().load('../img/3dplanet/earthspec4k.jpg');

    // Geometry is what the shape/size of the globe will be
let earthGeometry = new THREE.SphereGeometry (10, 32, 32);

    // Material is how the globe will look like
let earthMaterial = new THREE.MeshPhongMaterial ({
    map: earthMap,
    // bumpMap: earthBumpMap,
    bumpScale: 0.10,
    // specularMap: EarthSpecMap,
    specular: new THREE.Color('gray')
});

// Earth is the final product which ends up being rendered on scene, also is used as a grandparent for the point of interest
let earth = new THREE.Mesh(earthGeometry, earthMaterial);

// Add the earth to scene
scene.add( earth );

// Add clouds to the earth object
let earthCloudGeo = new THREE.SphereGeometry(10,32,32);

// Add cloud texture
let earthCloudsTexture = new THREE.TextureLoader().load('../img/3dplanet/earthhiresclouds4K.jpg')

// Add cloud material
let earthMaterialClouds = new THREE.MeshLambertMaterial({
    color: 0xffffff,
    map: earthCloudsTexture,
    transparent: true,
    opacity: 0.4
});

// Create final texture for clouds
let earthClouds = new THREE.Mesh(earthCloudGeo, earthMaterialClouds);

// Scale above the earth sphere mesh
earthClouds.scale.set(1.015, 1.015, 1.015);

// Make child of the earth
// earth.add( earthClouds ); 

// *CREATE variable to store array of lights
let lights = [];

// CreateSkyBox allows the scene to have more attractiveness to it, in this case by having the blue starred images around it
function createSkyBox(scene){
    const loader = new THREE.CubeTextureLoader();
    const texture = loader.load([
        '../img/3dplanet/space_right.png',
        '../img/3dplanet/space_left.png',
        '../img/3dplanet/space_top.png',
        '../img/3dplanet/space_bot.png',
        '../img/3dplanet/space_front.png',
        '../img/3dplanet/space_back.png'  
    ])
    scene.background = texture;
}


// CreateLights is a function which create the lights and adds them to the scene.
function createLights(scene){
    lights[0] = new THREE.PointLight("#ffc0cb", .5, 100); 
    lights[1] = new THREE.PointLight("#ffc0cb", .5, 100);
    lights[2] = new THREE.PointLight("#ffc0cb", .7, 100);
    lights[3] = new THREE.AmbientLight("#ffffff");

    // set position for lights
    lights[0].position.set(200, 0, -400);
    lights[1].position.set(200, 200, 400);
    lights[2].position.set(-200, -200, -50);

    scene.add(lights[0]);
    scene.add(lights[1]);
    scene.add(lights[2]);
    scene.add(lights[3]);
}
function addSceneObjects(scene) {
    createLights(scene);
    // createSkyBox(scene);
}
    
// AddSceneObjects adds the items to the scene
addSceneObjects(scene);

// Change position so we can see the objects
camera.position.z = 20;

// Disable control function, so users do not zoom in too far in or pan away from center
controls.minDistance = 12;
controls.maxDistance = 30;
controls.enablePan = false;
controls.update();
controls.saveState(); // from here this is the default setting

// Add event listeners so DOM knows what functions to use when obj/items are interacted with 
window.addEventListener('resize', onWindowResize, false);



    // Window resize
function onWindowResize(){
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth , window.innerHeight)
}

    // Animation function
function animate() {
    requestAnimationFrame( animate ); 
    render();
    controls.update();
}

function render(){
	renderer.render( scene, camera );
}

// Create and add coordinates for the globe
function addCountryCoord(earth, country, language, latitude, longitude, color, region, population, area_sq_mi, gpd_per_capita, climate){
    
}

animate();


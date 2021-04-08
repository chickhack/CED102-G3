import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.117.1/build/three.module.js';
import {OrbitControls} from 'https://cdn.skypack.dev/three@0.120.0/examples/jsm/controls/OrbitControls.js';

function main() {
  const canvas = document.querySelector("#glCanvas");
  // Initialize the GL context
  const gl = canvas.getContext("webgl");

  // Only continue if WebGL is available and working
  if (gl === null) {
    alert("Unable to initialize WebGL. Your browser or machine may not support it.");
    return;
  }

  // Set clear color to black, fully opaque
  gl.clearColor(1, 0.5, 0.5, 3);
  // Clear the color buffer with specified clear color
  gl.clear(gl.COLOR_BUFFER_BIT);

  // const scene = new THREE.Scene();

  // const geometry = new THREE.SphereGeometry( 5, 32, 32 );
  // const material = new THREE.MeshBasicMaterial( {color: 0xffff00} );
  // const sphere = new THREE.Mesh( geometry, material );
  // scene.add( sphere );

  const scene = new THREE.Scene();

  const camera = new THREE.PerspectiveCamera(75, window.innerWidth/window.innerHeight, 0.1, 1000);
  const renderer = new THREE.WebGLRenderer();
  renderer.setSize(gl.innerWidth, gl.innerHeight);

  const controls = new OrbitControls(camera, renderer.domElement);


  let earthMap = new THREE.TextureLoader().load('../img/3dplanet/8k_mars.jpeg');
  let earthGeometry = new THREE.SphereGeometry (10, 32, 32);
  let earthMaterial = new THREE.MeshPhongMaterial ({
    map: earthMap,
    // bumpMap: earthBumpMap,
    bumpScale: 0.10,
    // specularMap: EarthSpecMap,
    specular: new THREE.Color('gray')
  });
  let earth = new THREE.Mesh(earthGeometry, earthMaterial);
  scene.add( earth );

  let lights = [];
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
  addSceneObjects(scene);


  camera.position.z = 20;
  controls.minDistance = 12;
  controls.maxDistance = 30;
  controls.enablePan = false;
  controls.update();
  controls.saveState();

  function animate() {
    requestAnimationFrame( animate ); 
    render();
    controls.update();
  }

  function render(){
    renderer.render( scene, camera );
  }
  animate();
  }

}

window.onload = main;

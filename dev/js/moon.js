import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.117.1/build/three.module.js';
import {OrbitControls} from 'https://cdn.skypack.dev/three@0.120.0/examples/jsm/controls/OrbitControls.js';

function main()
{
  const renderer = new THREE.WebGLRenderer();
  const size = Math.min(width, 600); 
  renderer.setSize(size, size); renderer.setPixelRatio(devicePixelRatio);

  const camera = new THREE.PerspectiveCamera(45, 1, 0.1, 1000).translateZ(2.8);
  const controls = new THREE.OrbitControls(camera, renderer.domElement);
  controls.minDistance = 1.12; controls.maxDistance = 10;

  const scene = new THREE.Scene();
  const map = await loadTexture(`https://solartextures.b-cdn.net/2k_mars.jpg`);
  scene.add(new THREE.Mesh(new THREE.SphereBufferGeometry(1, 32, 32), new THREE.MeshBasicMaterial({map})));
  
  renderer.render(scene, camera);
  controls.addEventListener("change", () => renderer.render(scene, camera));
  invalidation.then(() => (controls.dispose(), renderer.dispose()));

  return renderer.domElement;

}
loadTexture = ƒ(url);
function loadTexture() {
  const loader = new THREE.TextureLoader();
  return url => new Promise(resolve => loader.load(url, resolve));
}
main();
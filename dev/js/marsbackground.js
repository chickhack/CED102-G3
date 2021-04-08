let clock = new THREE.Clock();

const imgLoc = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/";
let camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 10000),
    light = new THREE.PointLight(0xFFFFFF, 2, 4000);
camera.position.set(1300, 0, 0),

    scene = new THREE.Scene();
scene.background = new THREE.Color(0x0c0d18);


camera.lookAt(scene.position);
light.position.set(300, 2000, 1500);
scene.add(light);

let marsGeo = new THREE.SphereGeometry(500, 32, 32),
    marsMaterial = new THREE.MeshPhongMaterial(),
    marsMesh = new THREE.Mesh(marsGeo, marsMaterial);
scene.add(marsMesh);

let loader = new THREE.TextureLoader();
marsMaterial.map = loader.load(imgLoc + 'mars-map.jpg');
marsMaterial.bumpMap = loader.load(imgLoc + 'mars-bump.jpg');
marsMaterial.bumpScale = 8;
marsMaterial.specular = new THREE.Color('#000000');

let renderer = new THREE.WebGLRenderer({ antialiasing: true });
renderer.setSize(window.innerWidth - 400, window.innerHeight - 200)
marsloc.appendChild(renderer.domElement);


function animate() {
    requestAnimationFrame(animate);
    render();
}

function render() {
    var delta = clock.getDelta();
    marsMesh.rotation.x += 0.05 * delta;
    renderer.clear();
    renderer.render(scene, camera);
}

animate();


window.addEventListener('resize', onWindowResize, false);

function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth - 40, window.innerHeight - 40);
}
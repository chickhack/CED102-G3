<!DOCTYPE html>
<html>
  <head>
    <title>管理員登入</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="./img/icon/shortcut.png"
      type="image/x-icon"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/pages/adminLogin.css" />
  </head>
  <body>
    <div class="login-div">
      <div class="row">
        <div class="logo "></div>
      </div>
      <div class="row center-align">
        <h5>管理員登入</h5>
        <!-- <h6>Use your Red Stapler Account</h6> -->
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email_input" type="email" />
          <label for="email_input">員工帳號</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password_input" type="password" class="validate" />
          <label for="password_input">密碼</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 forget">
          忘記密碼或帳號？<a href="mailto:Spaced@Mail.com"><b>聯絡帳號管理員</b></a>
        </div>
      </div>
      <div class="row"></div>
      <div class="row">
        <div class="col s6 QA"><a href="#">常見問題</a></div>
        <div class="col s6 right-align ">
          <a href="backstage/spaced_backstage_trip.php" class="waves-effect waves-light btn login_btn">登入</a>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r127/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/postprocessing@6.21.3/build/postprocessing.min.js"></script>
    <script>
      let scene,
        camera,
        cloudParticles = [],
        composer;

      function init() {
        scene = new THREE.Scene();
        camera = new THREE.PerspectiveCamera(
          60,
          window.innerWidth / window.innerHeight,
          1,
          1000
        );
        camera.position.z = 1;
        camera.rotation.x = 1.16;
        camera.rotation.y = -0.12;
        camera.rotation.z = 0.27;

        let ambient = new THREE.AmbientLight(0x555555);
        scene.add(ambient);

        let directionalLight = new THREE.DirectionalLight(0xff7f00);
        directionalLight.position.set(0, 0, 1);
        scene.add(directionalLight);

        let orangeLight = new THREE.PointLight(0xa05509, 50, 450, 1.7);
        orangeLight.position.set(200, 300, 100);
        scene.add(orangeLight);
        let redLight = new THREE.PointLight(0x6e2b40, 50, 450, 1.7);
        redLight.position.set(100, 300, 100);
        scene.add(redLight);
        let blueLight = new THREE.PointLight(0x14334d, 50, 450, 1.7);
        blueLight.position.set(300, 300, 200);
        scene.add(blueLight);

        renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        scene.fog = new THREE.FogExp2(0x091e3d, 0.001);
        renderer.setClearColor(scene.fog.color);
        document.body.appendChild(renderer.domElement);

        let loader = new THREE.TextureLoader();
        loader.load("./img/login/smoke.png", function(texture) {
          cloudGeo = new THREE.PlaneBufferGeometry(500, 500);
          cloudMaterial = new THREE.MeshLambertMaterial({
            map: texture,
            transparent: true,
          });

          for (let p = 0; p < 50; p++) {
            let cloud = new THREE.Mesh(cloudGeo, cloudMaterial);
            cloud.position.set(
              Math.random() * 800 - 400,
              500,
              Math.random() * 500 - 500
            );
            cloud.rotation.x = 1.16;
            cloud.rotation.y = -0.12;
            cloud.rotation.z = Math.random() * 2 * Math.PI;
            cloud.material.opacity = 0.55;
            cloudParticles.push(cloud);
            scene.add(cloud);
          }
        });
        loader.load("./img/login/stars.jpg", function(texture) {
          const textureEffect = new POSTPROCESSING.TextureEffect({
            blendFunction: POSTPROCESSING.BlendFunction.COLOR_DODGE,
            texture: texture,
          });
          textureEffect.blendMode.opacity.value = 0.2;

          const bloomEffect = new POSTPROCESSING.BloomEffect({
            blendFunction: POSTPROCESSING.BlendFunction.COLOR_DODGE,
            kernelSize: POSTPROCESSING.KernelSize.SMALL,
            useLuminanceFilter: true,
            luminanceThreshold: 0.3,
            luminanceSmoothing: 0.75,
          });
          bloomEffect.blendMode.opacity.value = 1.5;

          let effectPass = new POSTPROCESSING.EffectPass(
            camera,
            bloomEffect,
            textureEffect
          );
          effectPass.renderToScreen = true;

          composer = new POSTPROCESSING.EffectComposer(renderer);
          composer.addPass(new POSTPROCESSING.RenderPass(scene, camera));
          composer.addPass(effectPass);

          window.addEventListener("resize", onWindowResize, false);
          render();
        });
      }
      function onWindowResize() {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
      }
      function render() {
        cloudParticles.forEach((p) => {
          p.rotation.z -= 0.001;
        });
        composer.render(0.1);
        requestAnimationFrame(render);
      }
      init();
    </script>
  </body>
</html>

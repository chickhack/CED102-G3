Vue.component("Mars", {
    template: `
        <div id="tab01" class="col-12 tab-inner">
          <div class="taball margin_top_10 col-lg-6 col-md-12">
            <div class="tab_left">
              <h2>火星</h2>
              <h3 class="margin_top_4">
                火星大氣以二氧化碳為主，既稀薄又寒冷，其表面特徵讓人聯想起月球上的撞擊坑，以及地球上的山谷、沙漠和極地冰蓋。
              </h3>
            </div>
            <div class="data margin_top_8">
              <div class="grav">
                <div class="dataTop">
                  <span class="var">38</span>
                  <span class="data-mid">％</span>
                </div>
                <p>重力</p>
              </div>
              <div class="day">
              <div class="dataTop">
                <span class="var">24</span>
                <span class="data-low">HR</span>
              </div>
                <p>一天</p>
              </div>
              <div class="temp">
              <div class="dataTop">
                <span class="data-mid">-</span>
                <span class="var">60</span>
                <span class="data-top">F</span>
              </div>
                <p>溫度</p>
              </div>
            </div>
            <button class="button_min">更多關於火星</button>
          </div>
          <div class="tab-active margin_top_5 col-lg-6 col-md-4">
            <img
              src="./img/planet/mars.png"
              style="max-width: 500px"
              class="geoplanet"
            />
          </div>
      </div>
        `,
  });
  Vue.component("moon", {
    template: `
    <div id="tab02" class="col-12 tab-inner">
    <div class="taball margin_top_10 col-lg-6 col-md-12">
      <div class="tab_left">
        <h2>月球</h2>
        <h3 class="margin_top_4">
          月球大氣以二氧化碳為主，既稀薄又寒冷，其表面特徵讓人聯想起月球上的撞擊坑，以及地球上的山谷、沙漠和極地冰蓋。
        </h3>
      </div>
      <div class="data margin_top_8">
        <div class="grav">
          <div class="dataTop">
            <span class="var">57</span></span>
            <span class="data-mid">％</span>
          </div>
          <p>重力</p>
        </div>
        <div class="day">
        <div class="dataTop">
          <span class="var">20</span>
          <span class="data-low">HR</span>
        </div>
          <p>一天</p>
        </div>
        <div class="temp">
        <div class="dataTop">
          <span class="data-mid">-</span>
          <span class="var">40</span>
          <span class="data-top">F</span>
        </div>
          <p>溫度</p>
        </div>
      </div>
      <button class="button_min">更多關於月球</button>
    </div>
    <div class="tab-active margin_top_5 col-lg-6 col-md-4">
      <img
        src="./img/planet/moon.png"
        style="max-width: 500px"
        class="geoplanet"
      />
    </div>
</div>
        `,
  });
  Vue.component("saturn", {
    template: `
    <div id="tab02" class="col-12 tab-inner">
    <div class="taball margin_top_10 col-lg-6 col-sm-12">
      <div class="tab_left">
        <h2>木星</h2>
        <h3 class="margin_top_4">
          木星大氣以二氧化碳為主，既稀薄又寒冷，其表面特徵讓人聯想起月球上的撞擊坑，以及地球上的山谷、沙漠和極地冰蓋。
        </h3>
      </div>
      <div class="data margin_top_8">
        <div class="grav">
          <div class="dataTop">
            <span class="var">77</span></span>
            <span class="data-mid">％</span>
          </div>
          <p>重力</p>
        </div>
        <div class="day">
        <div class="dataTop">
          <span class="var">50</span>
          <span class="data-low">HR</span>
        </div>
          <p>一天</p>
        </div>
        <div class="temp">
        <div class="dataTop">
          <span class="data-mid">-</span>
          <span class="var">140</span>
          <span class="data-top">F</span>
        </div>
          <p>溫度</p>
        </div>
      </div>
      <button class="button_min">更多關於木星</button>
    </div>
    <div class="tab-active margin_top_5 col-lg-6 col-sm-12">
      <img
        src="./img/planet/moon.png"
        style="max-width: 500px"
        class="geoplanet"
      />
    </div>
</div>
        `,
  });

  new Vue({
    el: "#planetData",
    data: {
      content: "mars",
      isActie: true,
    },
  });
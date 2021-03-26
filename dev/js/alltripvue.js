let vm = new Vue({
    el: "#app",
    data: {
        top: [{
            planet: "./img/trip/jupiter.png",
            spot: "./img/trip/trip_jupiter/jupiter_top_a_ps.png",
            title: "熱門星球",
            name: "木星 | 冰層探索一日遊",
            star: "./img/icon/star.png",
            grade: "初階",
            scores: "3000",
            price: 5000,

        }, {
            planet: "./img/trip/mars.png",
            spot: "./img/trip/trip_mars/mars_top_a1_ps.jpg.png",
            title: "進階景點",
            name: "火星 | 攀登太陽系第一高山",
            star: "./img/icon/star.png",
            grade: "高階",
            scores: "5000",
            price: 5000,

        }, {
            planet: "./img/trip/moon.png",
            spot: "./img/trip/trip_moon/moon_top_a1_ps.png",
            title: "新景點",
            name: "月球 | 太空體驗一日遊",
            star: "./img/icon/star.png",
            grade: "初階",
            scores: "3000",
            price: 5000,
        },
        ],
        second: [{
            planet: 月球,
            spot: "./img/trip/trip_mars/mars_c1_ps.png",
            title: "月球 | 太空體驗一日遊",
            grade: "初階",
            scores: "5000",
            price: 5000,
        },{
            planet: 火星,
            spot: "./img/trip/trip_mars/mars_c1_ps.png",
            title: "月球 | 熱氣球一日遊",
            grade: "初階",
            scores: "5000",
            price: 5000,
        },{
            planet: 木星,
            spot: "./img/trip/trip_mars/mars_c1_ps.png",
            title: "月球 | 宇宙雨林秘境一日遊",
            grade: "高階",
            scores: "5000",
            price: 5000,
        },]
    },


});
let vm = new Vue({
    el: "#app",
    data: {
        planets: [],
        spot1: [],
        spot2: [],
        spot3: [],
    
    },
    methods: {
        pricePick(){
            this.products.forEach(prod => {
                console.log(prod["spot_price"].sort());
            })
        }
    },
    mounted() {
        console.log("load");
        fetch('./php/getSelectTrip.php').then(res => res.json()).then(res => this.planets = res);
        console.log(this.planets);
        fetch('./php/getMoon.php').then(res => res.json()).then(res => this.spot1 = res);
        fetch('./php/getMars.php').then(res => res.json()).then(res => this.spot2 = res);
        fetch('./php/getJupiter.php').then(res => res.json()).then(res => this.spot3 = res);
    },
});



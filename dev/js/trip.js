let vm = new Vue({
    el: "#app",
    props: ['spot_no'],
    data: {
        number: 4.8,
        totalStar: 5,
        comments: [
            {
                src: "./img/userprofile/user1.png",
                name: "Doris",
                date: "21.03.11",
                content: "我和先生都喜歡玩水，第一次接觸SUP，雖然我不太會游泳，但全程教練們都在一旁讓人感覺很安心，除了專業又幽默的教學外😊"
            }, {
                src: "./img/userprofile/user3.png",
                name: "Doris",
                date: "21.03.11",
                content: "我和先生都喜歡玩水，第一次接觸SUP，雖然我不太會游泳，但全程教練們都在一旁讓人感覺很安心，除了專業又幽默的教學外😊"
            }, {
                src: "./img/userprofile/user5.png",
                name: "Doris",
                date: "21.03.11",
                content: "我和先生都喜歡玩水，第一次接觸SUP，雖然我不太會游泳，但全程教練們都在一旁讓人感覺很安心，除了專業又幽默的教學外😊"
            },
        ],
        second: [],
        computed: {
            subContent() {
                if (this.content.length > 20) {
                    return this.content.substr(1, 10);
                } else {
                    return this.content;
                }
            }
        }
    },
    mounted() {
        console.log("load");
        fetch('./php/getRecommandSpot.php').then(res => res.json()).then(res => this.second = res);
        console.log(this.second);
        
    },
});
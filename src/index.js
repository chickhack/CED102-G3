import 'jquery';
import Vue from 'vue';
import hello from './hello.vue';
import jquery from 'jquery';

Vue.prototype.$ = jquery;

new Vue({
  el: '#app',
  mounted : function(){
    console.log('Hello World');

  },
  components: { hello },
  template: '<hello/>'
});

const pig=["leg", "head", "foot", "noise","sadd"];
console.log(pig);
action();
$(document).ready(function(){
    $('.title').click(function(e){
        $(this).css({color:"yellow"});
    })

});

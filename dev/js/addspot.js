let trips = document.querySelectorAll('.myTrip');
for (let i = 0; i < trips.length; i++) {
    trips[i].addEventListener('click', ()=>{
        tripNumbers();
    })
}

//知道多少東西加進去我的行程
function tripNumbers(){
    localStorage.setItem('tripNumbers',1);
}
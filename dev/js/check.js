const identities = document.querySelectorAll(".identity");
const submitBtn = document.querySelector("button");

// 檢查身分證字號
// let checkId = () => {
//     let regx = new RegExp(/^[a-z|A-Z]{1}[1-2]{1}\d{8}/);
//     let char = ["A","B","C","D","E","F","G","H","J","K","L","M","N","P","Q","R",
//     "S","T","U","V","X","Y","W","Z","I","O"];

//     let charCode = 0 ;
//     let total = 0 ;
//     let last = 0 ;
//     identities.forEach(id => {
//         if(id.value.match(regx)){
//             let letter = id.value.charAt(0).toUpperCase();
//             char.forEach((c,i) => {
//                 //檢查第一碼
//                 if(letter == c){
//                     i += 10;
//                     total = parseInt((i % 10) * 9 + (i / 10));
//                 }
//             })
//             //2~9碼數字規則
//             for(let i = 1 ; i < 9 ; i++){
//                 total += id.value.charAt(i) * (9-i);
//             }
//             //檢查碼
//             if(total % 10 === 0){
//                 last = 0;
//             }else{
//                 last = 10 - (total % 10);
//             }
//             //檢查碼確認
//             if(last.toString() === id.value.charAt(9)){
//                 alert("輸入成功");
//             }else{
//                 alert("身份證字號錯誤，請重新輸入身分證字號")
//             }
//         }else{
//             alert("身份證字號錯誤，請重新輸入身分證字號")
//         }
//     })
// }

// submitBtn.addEventListener("click", checkId);
// submitBtn.addEventListener("click", submitForm);


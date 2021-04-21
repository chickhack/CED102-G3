const {
    src,
    dest,
    series,
    parallel,
    watch
} = require('gulp');



//指令gulp do 會去跑do的東西
function defaultTask(cb) {
    //任務會寫在這
    console.log('hello gulp4');
    cb();
}
// 輸出任務
exports.do = defaultTask;

// 2.任務流程

//任務A
function funcA(cb){
    console.log("hihiop");
    cb();
}
function funcB(cb){
    console.log("hihigaygaygaygay");
    cb();
}


exports.doA = series(funcA,funcB);//任務串聯執行
exports.doB = parallel(funcA,funcB);//任務並聯執行


// 3.打包 src/dest

function movefile(){
    return src('js/main.js').pipe(dest('output'));//src檔案來源/目的地->輸出地
}
function movecss(){
    return src('css/sty.css').pipe(dest('output'));//src檔案來源/目的地->輸出地
    
}
exports.cp = movefile;

// 4.watch 監看

function watchtask(){
   watch('css/sty.css',movecss);//也可以監看多支檔案有沒有變動
    watch('js/main.js',movefile);//當main.js有變動時-->執行movefile任務
}
exports.gaygay = watchtask;

function watchall(){//同時監控與打包成mini
    watch (['css/sty.css','js/main.js']
    ,parallel(mini_css,uqlity_js));
}

exports.doall = watchall;

// 5.壓縮js檔案  uqlity
const uglify = require('gulp-uglify');//這東西要這樣給他變數去接用他，引入
const rename = require('gulp-rename');//這會去修改副檔名

function uqlity_js(){
    return src('js/main.js')
    .pipe(uglify())
    // .pipe(rename({
        // extname:'.min.js'修改副檔名
        // basename:'scipet'修改檔名
    // }))
    .pipe(dest('output/mini'));//src檔案來源/目的地->輸出地壓縮檔

}
exports.jsmini = uqlity_js;//exports.自行命名執行名子 = 要執行的程式名子


// 6.壓縮css

const cleanCSS = require('gulp-clean-css');

function mini_css(){
    return src('css/sty.css')
    .pipe(cleanCSS({compatibility:'ie10'}))
    .pipe(dest('output/css/mini'));
}

exports.cssmini = mini_css;


// 7.合併所有的css/js檔案程式碼

const concat = require('gulp-concat');

function cssconcat(){
    return src('css/*.css')//也可以指定不合併某檔案(['*.css','!css/某.css'])
    .pipe(concat('all.css'))
    // .pipe(cleanCSS({compatibility:'ie10'})) 也可以合併完接者壓縮檔案
    .pipe(dest('output/css'));
}

exports.concat = cssconcat;

//sass編譯
// npm install node-sass gulp-sass --save-dev
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');

function styleSass(){
    return src('sass/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
        outputStyle:'expanded'//nested 巢狀|expanded | compr
    }).on('error',sass.logError))
    .pipe(sourcemaps.write())
    .pipe(dest('output/css'));
    
}

exports.style = styleSass;

// html template 可將兩支HTML合併
// npm install --save-dev gulp-file-include
const fileinclude = require('gulp-file-include');

function htmlTemplate(){
    return src('dev/*.html')
    .pipe(fileinclude({
        prefix: '@@',
        basepath: '@file'
    }))
    .pipe(dest('./dist'));

}
exports.htmlall = htmlTemplate;


// 套件清除舊檔案
// npm install --save-dev gulp-clean

const clean = require('gulp-clean');
function clearfile(){
    return src('css',{read:false,allowEmpty:true})//allowEmpty:true 允許資料夾不存在也能刪除
    .pipe(clean({force:true}));//{force:true}強制刪除
}
// exports.clear = clearfile;
exports.pcss = series(clearfile,styleSass);//先刪除css資料夾，再打包sass


//壓縮圖片 不過這很吃效能，圖片1mb以下使用較好
// npm install --save-dev gulp-imagemin

const imagemin = require('gulp-imagemin');

function imgs(){
    return src('images/*.*')
    .pipe(imagemin())
    // .pipe(rename({
        //prefix:"bonjour-",檔名前
        //suffix:"-min",檔名後
        // extname:'.min.css'修改副檔名
        //basename:'scripts'改檔名
    // }))
    .pipe(dest('images/mini/'))
}

exports.img = imgs;

// function clearfile_img(){
//     return src('images/mini',{read:false,allowEmpty:true})
//     .pipe(clean({force:true}));
// }

// exports.clearImg = series(clearfile_img,imgs);// 先執行刪除舊圖片 ->壓縮圖片

// 瀏覽器同步
// npm install browser-sync --save-dev

const browsersync = require('browser-sync').create();
const reload = browserSync.reload;

function browserSync(){
    browsersync.init({
        server:{
            baseDir:"./dev/",
            index:"index.html"
        },
        port:3000
    });
    
    // 監看檔案-->reload broswer
    watch('./dev/sass/*.scss',styleSass).on('change',reload);
    watch('./dev/*.html',htmlTemplate).on('change',reload);
}

exports.browser = browserSync;


// 跨瀏覽器
// npm install --save-dev gulp-autoprefixer

const autoprefixer = require('gulp-autoprefixer');

function autoprefix(){
    return src('css/*.css')
    .pipe(autoprefixer({
        cascade:false
    }))
    .pipe(rename({
        //prefix:"bonjour-",檔名前
        suffix:"-prefix"//檔名後
        // extname:'.min.css'修改副檔名
        //basename:'scripts'改檔名
    }))
    .pipe(dest('css'))

}
exports.prefix = autoprefix;

//babel 將JS寫法自動轉成嚴謹寫法ES6->ES5

const babel= require('gulp-babel');

function babel5(){
    return src('dev/js/*.js')
    .pipe(babel({
        presets:['@babel/env']
    }))
    .pipe(uglify())
    .pipe(dest('js'));
}

exports.jsbable = babel5;
// "braum.jpg","diana.jpg","Caitlyn.jpg","aurelionsol.jpg",,"poppy.jpg","oriana.jpg",
var image =["ahri.jpg","ashe.jpg","leesin.jpg","nidalee.jpg","blitzcrank.jpg","jinx.jpg"];
var current=null;
var count=0;
var remainingTime;

//hàm đảo giá trị mảng
function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;
    // While there remain elements to shuffle...
    while (0 !== currentIndex) {
        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }
    return array;
}

function flip(card) {

    $(card).css('pointer-events', 'none');
    $(card).toggleClass('flip');
    document.getElementById('click-music').play();
    document.getElementById('click-music').volume=0.2;
    if(!current){
        current = $(card);
        $(card).css('pointer-events', 'none');
        console.log(current);
    }else {
        $('.card').css('pointer-events', 'none');
        console.log(current);
        if(current.attr('data-name')!=$(card).attr('data-name')){
            document.getElementById('click-wrong').play();
            document.getElementById('click-wrong').volume=0.2;
            //khong cho click div card
            console.log(current);
            $('.card').css('pointer-events', 'none');
            setTimeout(function () {
                current.toggleClass('flip');
                $(card).toggleClass('flip');
                current=null;

            },400);
            //mở click div card
            $('.card').css('pointer-events', 'auto');

        }else{
            document.getElementById('click-right').play();
            document.getElementById('click-right').volume=0.2;
            $('.card').css('pointer-events', 'none');
            setTimeout(function () {
                $(card).removeAttr("onclick");
                 current.removeAttr("onclick");
                $(card).css('opacity','0');
                current.css('opacity','0');
                count++;

                if(count==(image.length/2)){
                    $('.endgame').css('display','block');
                    $('#win').css('display','block');
                    $('#progressBar div').stop();
                    document.getElementById('win-sound').play();
                    clearInterval(timer);
                }
                current=null;
            },500);
            $('.card').css('pointer-events', 'auto');
        }

    }

}
function progressBar(time, $element) {
    var progressBarWidth =$element.width();
    $element.find('div').animate(
        { width: progressBarWidth },
        time*1000).html();
}

function startGame(){
        remainingTime=60;
        $('.startgame').css('display','none');
    // music background
    document.getElementById('bg-music').play();
    document.getElementById('bg-music').volume=0.03;
    $('#progressBar').css('display','block');

    //count time
    progressBar(remainingTime, $('#progressBar'));
    timer =setInterval(function(){
        remainingTime--;
        console.log(remainingTime);
        //time up
        if(remainingTime==0){
            //end game
            $('.endgame').css('display','block');
            $('#lose').css('display','block');
            document.getElementById('lose-sound').play();
            clearInterval(timer);
            $('.card').removeAttr("onclick");

        }

    },1000);
}
function loadGame() {
    window.location.href="index.html";
}
//autoload
$(function () {
    var timer;
    $('.startgame').css('width','window.innerWidth');
    image=image.concat(image);
    shuffle(image);
    var content="";
    for(var i=0;i<image.length;i++){
        content+="<div class='grid'>"
        content+="<div class='card' data-name='"+image[i]+"' onclick='flip(this)'>"
        content+="<div class='front'>"
        content+="<img src='./img/card.jpg' alt=''>"
        content+="</div>"
        content+="<div class='back'>"
        content+="<img src='./img/"+image[i]+" ' alt=''>"
        content+="</div>"
        content+="</div>"
        content+="</div>"
        $('.contenter').html(content);
        
    };


})
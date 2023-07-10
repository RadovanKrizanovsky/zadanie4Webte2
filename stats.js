
//console.log(times[0].getTime());
//6:00-15:00, 15:00-21:00, 21:00-24:00, 24:00-6:00

var numSixFiveteen = 0;
var numFiveteenTwentyOne = 0;
var numTwentyOneTwentyFOur = 0;
var numTwentyfourSix = 0;

times.forEach(element => {
    console.log(Number(element.time.substring(15, 18)));
    if(Number(element.time.substring(15, 18)) > 6 && Number(element.time.substring(15, 18)) <= 15) {
        numSixFiveteen++;
    } else if(Number(element.time.substring(15, 18)) > 15 && Number(element.time.substring(15, 18)) <= 21) {
        numFiveteenTwentyOne++; 
    } else if(Number(element.time.substring(15, 18)) > 21 && Number(element.time.substring(15, 18)) <= 24) {
        numTwentyOneTwentyFOur++
    } else if(Number(element.time.substring(15, 18)) > 0 && Number(element.time.substring(15, 18)) <= 6) {
        numTwentyfourSix++
    }
});



document.getElementById("six").innerHTML = numSixFiveteen;

document.getElementById("fiveteen").innerHTML = numFiveteenTwentyOne;

document.getElementById("twentyOne").innerHTML = numTwentyOneTwentyFOur;

document.getElementById("twentyFour").innerHTML = numTwentyfourSix;

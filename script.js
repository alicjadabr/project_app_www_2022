function clearForm() {
  document.getElementById("form-contact").reset();
}

function changeBackground(hexNumber) {
  document.body.style.backgroundColor = hexNumber;
}

const toTop = () => window.scrollTo({top:0, behavior:'smooth'});

// timeline
var items = document.querySelectorAll("li");

function isItemInView(item) {
  var rect = item.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

function callbackFunc() {
  for (var i = 0; i < items.length; i++) {
    if (isItemInView(items[i])) {
      items[i].classList.add("show");
    }
  }
}
window.addEventListener("load", callbackFunc);
window.addEventListener("resize", callbackFunc);
window.addEventListener("scroll", callbackFunc);
// end timeline

// clock
var wakeUpTime = 7;
var noon = 12;
var lunchTime = 12;
var napTime = 14;
var evening = 18;  
var partyTime;

// show the current time on the page

function gettheDate() {
  Todays = new Date();
  TheDate = "" + Todays.getDate() + "/" + (Todays.getMonth() + 1) + "/"  + (Todays.getYear() - 100);
  document.getElementById("data").innerHTML = TheDate;
}
gettheDate();

var showCurrentTime = function()
{
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    var timeValue = "" + ((hours > 12) ? hours -12 : hours);
    timeValue += ((minutes < 10) ? ":0" : ":") + minutes;
    timeValue += ((seconds < 10) ? ":0" : ":") + seconds;
    timeValue += (hours >= 12) ? " P.M " : " A.M ";
    document.getElementById("clock").innerHTML = timeValue;
};

var updateClock = function() 
{
  var time = new Date().getHours();
  var messageText;
 
  var timeEventJS = document.getElementById("timeEvent");
  var catImage = document.getElementById('catImage');
  
  if (time == partyTime)
  {
    image = "https://media.salon.com/2022/05/cats-party-0516221.jpg";
    messageText = "Let's party!";
  }
  else if (time == wakeUpTime)
  {
    image = "https://st2.depositphotos.com/1499655/10288/i/450/depositphotos_102880768-stock-photo-a-large-gray-cat-coffee.jpg";
    messageText = "Wake up!";
  }
  else if (time == lunchTime)
  {
    image = "https://i.kym-cdn.com/photos/images/newsfeed/001/505/718/136.jpg";
    messageText = "Let's have some lunch!";
  }
  else if (time == napTime)
  {
    image = "https://cdn.icepop.com/wp-content/uploads/2019/04/Reddit-Estherthegrump.jpg";
    messageText = "Sleep tight!";
  }
  else if (time < noon)
  {
    image = "https://pbs.twimg.com/media/Er_HAlDXcAAP0KM.jpg";
    messageText = "Good morning!";
  }
  else if (time >= evening)
  {
    image = "https://www.purina.com.tr/sites/default/files/2018-06/cat-silhouette-moonlight.jpg";
    messageText = "Good evening!";
  }
  else
  {
    image = "https://i.kym-cdn.com/photos/images/original/002/036/391/4d9.jpg";
    messageText = "Good afternoon!";
  }

  timeEventJS.innerText = messageText;
  catImage.src = image;
  
  showCurrentTime();
};
updateClock();

// the clock increment once a second
var oneSecond = 1000;
setInterval( updateClock, oneSecond);

var partyButton = document.querySelector(".party-btn");

var partyEvent = function()
{
    if (partyTime < 0) 
    {
        partyTime = new Date().getHours();
        partyButton.innerText = "Party Over!";
        partyButton.style.backgroundColor = "#0A8DAB";
    }
    else
    {
        partyTime = -1;
        partyButton.innerText = "Party Time!";
        partyButton.style.backgroundColor = "#222";
    }
};

partyButton.addEventListener("click", partyEvent);
partyEvent(); 

// end clock

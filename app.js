const fetchData = (city) => {
    fetch("weatherFetch.php?city=" + city)
    .then(res => res.json())
    .then(data => {display(data)})
}
const display = (data)=>{
    document.querySelector(".cloud").innerHTML = data.weather[0].description;
    document.querySelector(".temp").innerHTML = `tempreture ${data.main.temp} farenheight`;
    document.querySelector(".city").innerHTML = `${data.name}`;
    document.querySelector(".humidity").innerHTML = `humidity ${data.main.humidity}%`;
    document.querySelector(".Wind").innerHTML = `wind ${data.wind.speed} miles/hr`;
    document.querySelector(".icon").src = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
}
document.querySelector('.btn').addEventListener('click',()=>{
    let city = document.querySelector(".location").value
    fetchData(city)
});
fetchData('Janakpur'); 

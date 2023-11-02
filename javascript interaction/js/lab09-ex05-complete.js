//In Class-8 – ex XX – COSC 2328 – Professor McCurry 
//Implemented by - Analee Maharaj


/*
//ex 9.5 step 1
//Create a function called simpleHandler.
//function simpleHandler(event) {
//create an alert that will display the message – Button was clicked
//}
//Assign the element with the id = "firstButton" to a variable btn.
const btn =  document.getElementById("firstButton");
//Add an event listener to the btn variable so that it calls the function simpleHandler
//ex 9.5 step 2
btn.addEventListener("click", function(){
//an anonymous function that will cause an alert to display - a different approach but same result
    alert("Button was clicked");

});*/
//ex 9.5 step 3
//add the same event handler for all three buttons
const buttons = document.querySelectorAll(".cards button");

for (let button of buttons)
{
    button.addEventListener('click',function(){
        alert('now just one handler');

    })
}
//apply alert on card
const cards = document.getElementsByClassName("cards");

for (let card of cards)
{
    card.addEventListener('click',function(){
        alert('now just one handler');

    })
}

//ex 9.5 step 4
for (let button of buttons){
    button.addEventListener('click',function(e){
        let para =e.target.previousElementSibling;
        alert(para.textContent);

    })
}
//ex 9.5 step 5

const images = document.querySelectorAll(".card img");
/*
// Apply the sepia effect to the images when they are moused over and remove it when the mouse moves out
for (let image of images){
    image.addEventListener('mouseover', function(e){
        e.target.classList.add("sepia");
    });
    // Remove the "sepia" class when the mouse leaves the images
    image.addEventListener('mouseout', function(e){
        e.target.classList.remove("sepia"); 
    });
}

//ex 9.5 step 6


for (let image of images) {
    image.addEventListener('mouseenter', function(e) {
        e.target.classList.toggle("sepia");
    });
};



for (let image of images)  {
    image.addEventListener('mouseenter', function(e) {
    //use CSS style to use grayscale
        e.target.style.filter = "grayscale(100%)";
    });
    //remove grayscale when the mouseleaves the image
    image.addEventListener('mouseleave', function(e) {
        e.target.style.filter = "none"; 
    });
};
*/
for (let image of images) {
    image.addEventListener('mouseenter', function(e) {
        //reduce opacity to 0.2 when the mouse is hovered over it
        e.target.style.opacity = 0.2; 
    });

    image.addEventListener('mouseleave', function(e) {
        //full opacity when mouse leaves
        e.target.style.opacity = 1; 
    });
};










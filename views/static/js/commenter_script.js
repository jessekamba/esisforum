document.querySelector(".commenter_no_connected").addEventListener("click", function(){
    document.querySelectorAll(".back_pop_up")[1].style.display = "block";
});
document.querySelectorAll(".pop_up div")[1].addEventListener("click", function(){
    document.querySelectorAll(".back_pop_up")[1].style.display = "none";
});
document.querySelector(".inscrivons").addEventListener("click", function(){
    document.querySelectorAll(".back_pop_up")[0].style.display = "block";
    document.querySelectorAll(".back_pop_up")[1].style.display = "none";
    document.querySelectorAll(".pop_up div")[0].addEventListener("click", function(){
        document.querySelectorAll(".back_pop_up")[0].style.display = "none";
    });
});
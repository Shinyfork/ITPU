let image =  document.getElementById("imgChange");

function changeImg()
{
    if (image.getAttribute('src') == "zebra1.webp")
    {
        image.src = "zebrak.webp";
    }
    else
    {
        image.src = "zebra1.webp";
    }
}
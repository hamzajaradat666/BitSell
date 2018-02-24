window.onload = function () {

    document.querySelectorAll(".sec-btu").forEach(ele => ele.addEventListener('click', function (e) {
            document.querySelectorAll(".secs").forEach(el => el.style.display = 'none');


            if (document.getElementById("section" + e.target.getAttribute('section')).style.display == 'none')
                document.getElementById("section" + e.target.getAttribute('section')).style.display = 'block'

            else if (document.getElementById("section" + e.target.getAttribute('section')).style.display == 'block')
                     document.getElementById("section" + e.target.getAttribute('section')).style.display = 'none'
        }

    ))
}



/*window.onload = function() {
    var btns = document.querySelectorAll('.sec-btu');
    for (let i = 0; i < btns.length; i ++) {
        let btn = btns[i];
        btn.addEventListener("click",function(e){

            console.log('dbasyfvb')

        },false);
    }
}


 document.querySelectorAll(".sec-btu").forEach(ele => ele.addEventListener('click',function(e){
        
        document.querySelectorAll(".secs").forEach(ele2 => {
            
            
            if(ele2.getAttribute("name")=="s1")ele2.setAttribute("style","display:block")
            if(ele2.getAttribute("name")=="s2")ele2.setAttribute("style","display:block")
            if(ele2.getAttribute("name")=="s3")ele2.setAttribute("style","display:block")
            if(ele2.getAttribute("name")=="s41")ele2.setAttribute("style","display:block")
            if(ele2.getAttribute("name")=="s42")ele2.setAttribute("style","display:block")
                   
                   console.log(ele2)
            
            
        }
                                                  
    )
        
            })                                         
    )


    
    

    






*/

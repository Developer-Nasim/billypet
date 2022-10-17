(function($) {
  "use strict";
  
  
  if (document.querySelectorAll('.name_giving_permision').length > 0) { 
    let rclct = document.querySelector('.name_giving_permision')
    rclct.addEventListener('click', (e) => { 
        let rPrm = rclct.parentElement;
        let rpmOnly = rPrm.querySelector("input[type='hidden']");
        if (rPrm.classList.contains('no_name')) {
            rPrm.classList.remove('no_name')
            rpmOnly.value = "have_name"
        }else{
            rPrm.classList.add('no_name')
            rpmOnly.value = ""
        } 
    })  
}

  let btns = document.querySelectorAll('.choseSteps_bottom a')
  if (btns.length > 0) { 
    btns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault()
            let allType = document.querySelectorAll('.choseSteps_bottom a') 
            let allFrm = document.querySelectorAll('.form') 
            
            allFrm.forEach(frm => {
                frm.classList.remove('show')
            })
            let keepIt = e.target.href
            let keepItTrimed = keepIt.slice(keepIt.indexOf('#')+1)
            let findDiv = document.querySelector("."+keepItTrimed) 
            if (findDiv) {
                findDiv.classList.add('show')
            }

            function actionBtns() {
              allType.forEach(aBtn => {
                aBtn.classList.remove('active')
              })
              btn.classList.add('active')
            }
            actionBtns() 

        })
    })
  }
  $('select').niceSelect();

 
})(jQuery);

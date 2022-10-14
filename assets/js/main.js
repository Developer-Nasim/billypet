(function($) {
  "use strict";
  
  let btns = document.querySelectorAll('.choseSteps_bottom a')
  if (btns.length > 0) { 
    btns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault()
            let allFrm = document.querySelectorAll('.form')
            allFrm.forEach(frm => {
                frm.classList.remove('show')
            })
            let keepIt = e.target.href 
            let keepItTrimed = keepIt.slice(keepIt.indexOf('#')+1)
            let findDiv = document.querySelector("."+keepItTrimed)
            console.log(findDiv)
            if (findDiv) {
                findDiv.classList.add('show')
            }

        })
    })
  }
  $('select').niceSelect();

 
})(jQuery);

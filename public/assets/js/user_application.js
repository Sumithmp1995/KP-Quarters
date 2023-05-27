// Rank - Scale of Pay Dynamic Dependent

var typeObject = {
    MINISTERIAL: {
        "JUNIOR CLERK": ["27000-65000"],
         "TYPIST" : ["26000-62000"],
        "SENIOR CLERK": ["37000-75000"],
        "JUNIOR SUPREDENTENT": ["47000-85000"],
        "MANAGER" : ["57000-95000"],
        "ADMINISTRATIVE ASSISTANT" : ["57000-95000"],
    },
    EXECUTIVE : {
        "CPO/PC": ["31100 – 66800"],
        "SCPO/HDR": ["39300- 83000"],
        ASI: ["43400 – 91200"],
        SI: ["45600 – 95600"],
        IP: ["55200 – 115300"],
        IPHG: ["56500 – 118100"],
        DYSP: ["63700 – 123700"],
    },
};
window.onload = function () {

   // Set initial values of Date of Birth
    dob = '1990' + "-" + '01' + "-" + '01';
    document.getElementById("inputdob").value = dob;

    var typeSel = document.getElementById("type");
    var rankSel = document.getElementById("rank");
    var scale_of_paySel = document.getElementById("scale_of_pay");
  
    for (var x in typeObject) {
        typeSel.options[typeSel.options.length] = new Option(x, x);
         }
    typeSel.onchange = function () {
  
        //empty scale_of_pays- and ranks- dropdowns
        scale_of_paySel.options.length = 1;
        rankSel.options.length = 1;
        //display correct values
    
        for (var y in typeObject[this.value]) {
            rankSel.options[rankSel.options.length] = new Option(y, y);
        }
    };
    rankSel.onchange = function () {
    
        scale_of_paySel.remove(0);
        //display correct values
        var z = typeObject[typeSel.value][this.value];
        var sop = new Option(z[0], z[0]);
        scale_of_paySel.options.add(sop);

         var glNo = document.getElementById('glNo');
        if(rankSel.value == 'CPO/PC' || rankSel.value == 'SCPO/HDR') {
            showGlNo();
           }  else {
            hideGlNo();
            }
            
            function showGlNo() {
                glNo.style.visibility = "visible";
                glNo.style.display = "block";
            }

            function hideGlNo() {
                glNo.style.visibility = "hidden";
                glNo.style.display = "none";
            }
        }
    };

   
 function checkPay() {

    let bpay = document.getElementById("pay").value;
    bpay = parseInt(bpay);
    let scaleOfPay = document.getElementById("scale_of_pay").value;
    let spay = scaleOfPay.split("-");
    leastValue = parseInt(spay[0]);
    if(leastValue > bpay ) {
        document.getElementById("payError").innerHTML = `Basic Pay must be between Your Scale of pay`; 
    } else {
        document.getElementById("payError").innerHTML = ''; 
    }
 }

    




// Generate Application No
function findAppId() {
    console.log("dd");
    const pen = document.getElementById("inputpen").value;
    const d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    year = year.toString();
    year = year.slice(-2);
    month = pad(month);
    day = pad(day);

    function pad(d) {
        return d < 10 ? "0" + d.toString() : d.toString();
    }
    const applicationId = year + month + day + pen;
    document.getElementById("application_no").value = applicationId;
}





function findMob() {
    let mob = document.getElementById("mob").value;
    mob = parseInt(mob);
    if(mob < 999999999 || mob >9999999999) {
        document.getElementById("mobError").innerHTML = `Mobile Number must contain 10 Digits`; 
    } else {
        document.getElementById("mobError").innerHTML = ''; 
    }
}



// Date of Superannuation
function doSomething() {
    const doj = document.getElementById("inputdoJ").value;
    const dob = document.getElementById("inputdob").value;
    var fullDoj = doj.split("-");
    var fullDob = dob.split("-");
    var dobYear = parseInt(fullDob[0]);
    var jyear = parseInt(fullDoj[0]);
    var month = parseInt(fullDob[1]);
    
    console.log(jyear-dobYear);

    if( jyear-dobYear <= 18 ) {
        document.getElementById("dojError").innerHTML = `Date of Joining must 18 years greater than Date of Birth `;
    } else {
        document.getElementById("dojError").innerHTML = ''; 
    }


    if (jyear < 2013) {
        var newYear = dobYear + 56;
        var newDate = 0;
        switch (month) {
            case 1: newDate = 31; break;
            case 2:
                {
                    if (jyear % 4 == 0 || jyear % 400 == 0) {
                        newDate = 29;
                    } else {
                        newDate = 28;
                    }
                }
                break;
            case 3: newDate = 31;break;
            case 4:newDate = 30; break;
            case 5:newDate = 31;break;
            case 6:newDate = 30;break;
            case 7:newDate = 31;break;
            case 8:newDate = 31;break;
            case 9: newDate = 30;break;
            case 10:newDate = 31;break;
            case 11: newDate = 30;break;
            case 12:newDate = 31;
        }
    } else {
        newYear = dobYear + 60;
        switch (month) {
            case 1:newDate = 31; break;
            case 2:
                if (jyear % 4 == 0 || jyear % 400 == 0) {
                    newDate = 29;
                } else {
                    newDate = 28;
                }
                break;
                case 3: newDate = 31;break;
                case 4:newDate = 30; break;
                case 5:newDate = 31;break;
                case 6:newDate = 30;break;
                case 7:newDate = 31;break;
                case 8:newDate = 31;break;
                case 9: newDate = 30;break;
                case 10:newDate = 31;break;
                case 11: newDate = 30;break;
                case 12:newDate = 31;
        }
    }
    newMonth = pad(month);

    function pad(d) {
        return d < 10 ? "0" + d.toString() : d.toString();
    }

    dor = newYear + "-" + newMonth + "-" + newDate;
    document.getElementById("inputsa").value = dor;
}



// Working Status

function showFileUpload(wsfile) {
  
    var motherUnit = document.getElementById('mother_unit').value;
    var presentUnit = document.getElementById('present_unit').value;
    if( motherUnit != presentUnit) {
    document.getElementById(wsfile).style.visibility = "visible";
    document.getElementById(wsfile).style.display = "block";
    document.getElementById("workingStatusDoc").setAttribute("required", "");
            } else {
                document.getElementById(wsfile).style.visibility = "hidden";
                document.getElementById(wsfile).style.display = "none";
                document.getElementById("workingStatusDoc").removeAttribute("required", "");
            }
}


function showTemporaryAdressField() {
  let temporaryAddress =   document.getElementById('temporaryAddress');
  let temporaryAddressCheckBox =   document.getElementById('temporaryAddressCheckBox');
 
  if(temporaryAddressCheckBox.checked == true) {
    temporaryAddress.style.visibility = "hidden";
    temporaryAddress.style.display = "none";
  } else {

    temporaryAddress.style.visibility = "visible";
    temporaryAddress.style.display = "block";
  }
 
}



  
function checkPay() {

    let bpay = document.getElementById("pay").value;
    bpay = parseInt(bpay);
    console.log(bpay);
    let scaleOfPay = document.getElementById("scale_of_pay").value;
    let spay = scaleOfPay.split("-");
    leastValue = parseInt(spay[0]);
    mostValue = parseInt(spay[1]);
    // console.log(spay);
    console.log(mostValue);
    if(leastValue > bpay || mostValue < bpay) {
        document.getElementById("payError").innerHTML = `Basic Pay must be between your Scale of pay`; 
    } else {
        document.getElementById("payError").innerHTML = ''; 
    }
 }  


 function validateCategory() {
 
    let category = document.getElementById("type").value;
    let rank = document.getElementById("rank").value;
    if(!category) {
        document.getElementById("categoryError").innerHTML = `Select Category`;   
    } else {
        document.getElementById("categoryError").innerHTML = '';  
    }
    
    if(!rank ) {
        document.getElementById("rankError").innerHTML = `Select DESIGNATION / RANK `; 
    } else {
        document.getElementById("rankError").innerHTML = ''; 
    }
   
    }
 
    function category() {
        let category = document.getElementById("type").value;
        let rank = document.getElementById("rank").value;
        if( category ) {
            document.getElementById("categoryError").innerHTML = ''; 
            } 
        if( rank) {
                document.getElementById("rankError").innerHTML = ''; 
            }
       
        }
    
 
        function setPriority() {
            console.log("dd");
            let p1 = document.getElementById("p1").value;
            let p2 = document.getElementById("p2").value;
            let p3 = document.getElementById("p3").value;
         
            if( p1 || p2 || p3 ) {
             document.getElementById("prioritySuccess").innerHTML = 'Priority Has been Set.Once you submit the form, The Priority cannot be Undone'; 
             document.getElementById("priorityError").innerHTML = ' '; 
            } else {
                document.getElementById("prioritySuccess").innerHTML = ' ';
                    document.getElementById("priorityError").innerHTML = 'Priority not Set'; 
                }
           
            }
            
            // function checkPriority() {
            //     console.log("dd");
            //     let p1 = document.getElementById("p1").value;
            //     let p2 = document.getElementById("p2").value;
            //     let p3 = document.getElementById("p3").value;
            //     console.log(p1);
            //     console.log(p2);
            //     console.log(p3);
            //     if( p1 == p2 || p1 == p3 || p2 == p3) {
            //      document.getElementById("prioritySuccess").innerHTML = 'Priority Has been Set.Once you submit the form, The Priority cannot be Undone'; 
            //      document.getElementById("priorityError").innerHTML = ' '; 
            //     } else {
            //         document.getElementById("prioritySuccess").innerHTML = ' ';
            //             document.getElementById("priorityError").innerHTML = 'Priority Not been Set'; 
            //         }
               
            //     }  




// Rank - Scale of Pay Dynamic Dependent

var typeObject = {
    MINISTERIAL: {
        "JUNIOR CLERK": ["27,000-65000"],
         "TYPIST" : ["26,000-62000"],
        "SENIOR CLERK": ["37,000-75000"],
        "JUNIOR SUPREDENTENT": ["47,000-85000"],
        MANAGER: ["57,000-95000"],
    },
    EXECUTIVE: {
        "CPO/PC": ["31,100 – 66,800"],
        "SCPO/HDR": ["39,300- 83,000"],
        ASI: ["43,400 – 91,200"],
        SI: ["45,600 – 95,600"],
        IP: ["55,200 – 1,15,300"],
        IPHG: ["56,500 – 1,18,100"],
        DYSP: ["63,700 – 1,23,700"],
    },
};
window.onload = function () {
    var typeSel = document.getElementById("type");
    var rankSel = document.getElementById("rank");
    var scale_of_paySel = document.getElementById("scale_of_pay");
  
    for (var x in typeObject) {
        typeSel.options[typeSel.options.length] = new Option(x, x);
    }
    typeSel.onchange = function () {
        //empty scale_of_pays- and ranks- dropdowns
        scale_of_paySel.length = 1;
        rankSel.length = 1;
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
                // document.getElementById("workingStatusDoc").setAttribute("required", "");
            }

            function hideGlNo() {
                glNo.style.visibility = "hidden";
                glNo.style.display = "none";
            }
        }
    };

   



// Generate Application No
function findAppId() {
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

// Date of Superannuation

function doSomething() {
    const doj = document.getElementById("inputdoJ").value;
    const dob = document.getElementById("inputdob").value;
    var fullDoj = doj.split("-");
    var fullDob = dob.split("-");
    var dobYear = parseInt(fullDob[0]);
    var jyear = parseInt(fullDoj[0]);
    var month = parseInt(fullDob[1]);

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

function hideFileUpload(btn) {
    document.getElementById(btn).style.visibility = "hidden";
    btn.style.display = "none";
    document.getElementById("workingStatusDoc").removeAttribute("required", "");
}

function showFileUpload(wsfile, btn) {
    document.getElementById(wsfile).style.visibility = "visible";
    document.getElementById(wsfile).style.display = "block";
    document.getElementById("workingStatusDoc").setAttribute("required", "");
}





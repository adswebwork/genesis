/**
* This is the AIS Media simple Calendar manager.
* @author Paulo Delgado <pdelgado@aismedia.com>
* 
* Copyright ? 2006 - AIS Media
* www.aismedia.com
*
*/

/**
* Settings go here 
*/
var workingDiv = 'calendar';
var thisDate = new Date();
var thisYear = thisDate.getFullYear();
var thisMonth = thisDate.getMonth();
var workingYear = thisYear;
var workingMonth = thisMonth;
var workingXML = null;

/***********************************
* Start my xmlhttp object.
************************************/
function initXMLHTTP() {
	var xmlhttp;
	/*@cc_on @*/
	/*@if (@_jscript_version >= 5)
  	try {
  		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP")
 	} catch (e) {
  		try {
    			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
  		} catch (E) {
   			xmlhttp=false
  		}
 	}
	@else
 	xmlhttp=false
	@end @*/
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	 	try {
	  		xmlhttp = new XMLHttpRequest();
	 	} catch (e) {
	  		xmlhttp=false;
	 	}
	}	
	return xmlhttp;
}


// retrieve text of an XML document element, including
// elements using namespaces
function getElementTextNS(prefix, local, parentElem, index) {
    var result = "";
    if (prefix && isIE) {
        // IE/Windows way of handling namespaces
        result = parentElem.getElementsByTagName(prefix + ":" + local)[index];
    } else {
        // the namespace versions of this method 
        // (getElementsByTagNameNS()) operate
        // differently in Safari and Mozilla, but both
        // return value with just local name, provided 
        // there aren't conflicts with non-namespace element
        // names
        result = parentElem.getElementsByTagName(local)[index];
    }
    if (result) {
        // get text, accounting for possible
        // whitespace (carriage return) text nodes 
        if (result.childNodes.length > 1) {
            return result.childNodes[1].nodeValue;
        } else {
            return result.firstChild.nodeValue;    		
        }
    } else {
        return "n/a";
    }
}




function loadCalendar(year, month) {
	if(year == null) {
		year=new Date().getFullYear();
	}
	if(month == null) {
		month= thisMonth;
	}
	workingDiv = 'calendar';
	var wkd = document.getElementById(workingDiv);
	wkd.innerHTML = "Loading...";
	sendMonth = month +1;
	getString = "/x.php?year=" + year + "&month=" + sendMonth;
	xmlhttp = initXMLHTTP();
	xmlhttp.open("GET",getString,true);
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4) {
			var html_table = "";
			workingXML = xmlhttp.responseXML;
			
			var events = xmlhttp.responseXML.getElementsByTagName('event');
			if(events.length == 0) {
				html_table += "<div class='err_message'>No events found in this period.</div>";
			}
			
			matrix = getMatrixOfDays(month, year);
			
			html_table += '<div id="page_links">' + "\n" +
			'<a href="javascript:void(0);" id="previous_year" onclick="previousYear();" title="Previous Year">&lt; &lt;</a>' + "\n" +
			'<a href="javascript:void(0);" id="previous_month" onclick="previousMonth();" title="Previous Month">&lt;</a>' + "\n" +
			'<span id="calendar_head">' + getMonthName(month) + " of " + year + '</span>' +"\n" +
			'<a href="javascript:void(0);" id="next_month" onclick="nextMonth();" title="Next Month">&gt;</a>' + "\n" +
			'<a href="javascript:void(0);" id="next_year" onclick="nextYear();" title="Next Year">&gt; &gt;</a><span class="tip">Click on an event to view details.</span></div>' + "\n" +
			'<table  id="calendar_table">' +"\n";
			
			for( i = 0 ; i < matrix.length ; i++) {    
				tmpObj = matrix[i];
				html_table += "<tr>\n";
				for(j= 0 ; j < tmpObj.length ; j++) {
					html_table  +=  '<td valign="top">' + "\n" +
				'<a href="javascript:void(0);" class="day_box"><h1>' + tmpObj[j] + '</h1>' + "\n";
				for(var k=0 ; k< events.length ; k++) {
					if(tmpObj[j] > 0) {
						if(events[k].getAttribute("day") == parseInt(tmpObj[j])) {
							var eventID =  getElementTextNS("", "id", events[k], 0);
							var title = getElementTextNS("", "title", events[k], 0);
							html_table += '<div onclick="showEvent(' + eventID + ');" type="event" class="event" title="'+title+'" >' + "\n" ;
							html_table += title + "\n";
							html_table +=  "</div>";
						}
					}
				}
				html_table += '</a></td>';
				}
				html_table += "</tr>";
			}
			html_table += "</table>\n ";
			wkd.innerHTML = html_table;
			
		}
	}
	xmlhttp.send(null);
	return false;
}


function getMatrixOfDays(month, year) {
	myDate = new Date();
	myDate.setFullYear(year, month, 1);
	monthName = getMonthName(month);
	firstDay = myDate.getDay();
	dayName = getDayName(firstDay);
	numRows = getNumberOfRowsInMonth(month, year);
	numDays = getNumberOfDaysInMonth(month, year);
	/* document.getElementById('message').innerHTML = monthName + ' the 1st of ' + year + " was a " + dayName + "<br/> " + 
		"this month has " + numRows; */
	startCount = 0;
	ret = new Array();
	for(i = 0 ; i < numRows ; i++) {
		tmpArr = new Array();
		for(j=0 ; j<7 ; j++) {
			//tmpArr.push("H");
			//alert("ret[" + i + "][" + j + "]");
			if(startCount > 0) {
				if(startCount > numDays) {
					tmpArr.push("-");	
				} else {
					tmpArr.push("" + startCount);
				}
				startCount++;
			} else {
				if(j == firstDay) {
					startCount =1;
					tmpArr.push("" + startCount);
					startCount++;
				} else {
					tmpArr.push("-");
				}
			}
				
			
		}
		ret.push(tmpArr);
	}
	return ret;
}

function getMonthName(month_number) {
	switch (month_number) {
		case 0: return 'January'; break;
		case 1: return 'February'; break;
		case 2: return 'March'; break;
		case 3: return 'April'; break;
		case 4: return 'May'; break;
		case 5: return 'June'; break;
		case 6: return 'July'; break;
		case 7: return 'August'; break;
		case 8: return 'September'; break;
		case 9: return 'October'; break;
		case 10: return 'November'; break;
		case 11: return 'December'; break;
		default: return "January"; break;
	}
}

function getDayName(dayOfWeek) {
	switch(dayOfWeek) {
		case 0: return 'Sunday'; break;
		case 1: return 'Monday'; break;
		case 2: return 'Tuesday'; break;
		case 3: return 'Wednesday'; break;
		case 4: return 'Thursday'; break;
		case 5: return 'Friday'; break;
		case 6: return 'Saturday'; break;
		
	}
}

function getNumberOfDaysInMonth(month, year) {
	switch(month) {
		case 0: return 31; break;
		case 1: {
			if(year % 4 == 0) {
				return 29;
			} else {
				return 28;
			}
		}
		case 2: return 31; break;
		case 3: return 30; break;
		case 4: return 31; break;
		case 5: return 30; break;
		case 6: return 31; break;
		case 7: return 31; break;
		case 8: return 30; break;
		case 9: return 31; break;
		case 10: return 30; break;
		case 11: return 31; break;
		default: {
			return 31; break;
		}
	}
}

function getNumberOfRowsInMonth(month, year) {
	numDays = getNumberOfDaysInMonth(month, year);
	myDate = new Date();
	myDate.setFullYear(year, month, 1);
	firstDay = myDate.getDay();
	weeks =Math.ceil(numDays / 7,0) +1;
	return weeks;
}

function nextMonth() {
	if(workingMonth == 11) {
		workingMonth = parseInt(0);
		workingYear++;
	} else {
		workingMonth++;
	}
	loadCalendar(workingYear, workingMonth);
}

function previousMonth() {
	if(workingMonth == 0) {
		workingMonth = 11;
		workingYear--;
	} else {
		if(workingMonth == 1) {
			workingMonth = parseInt(0);
		} else {
			workingMonth--;
		}
	}
	loadCalendar(workingYear, workingMonth);
}

function nextYear() {
	workingYear++;
	loadCalendar(workingYear, workingMonth);
}

function previousYear() {
	workingYear--;
	loadCalendar(workingYear, workingMonth);
}


function showEvent(eventID) {
	var myItems = workingXML.getElementsByTagName('event');
	for(var k=0 ; k< myItems.length ; k++) {
		if(myItems[k].getAttribute("id") == parseInt(eventID)) {
			var myWindow = window.open('' , 'abc' + eventID,'width=400, height=250, menubar=0, statusbar=0, toolbar=0, scroll=1, scrollbars=1' );
			
			var startDate = getElementTextNS("", "start_date", myItems[k], 0);
			var title = getElementTextNS("", "title", myItems[k], 0);
			var description = getElementTextNS("", "description", myItems[k], 0);
			
			var html_table = '<html><head><title></title></head><body>' + 
			'<style>' + 
			'body{font: 12px tahoma;line-height: 16px;}' +
			'h1{font: 18px arial; font-weight: bold; display: block; margin: 0; border-bottom: 2px solid black;}' + 
			'span {font: 11px arial; color: #454545; display: block; margin: 0; margin-bottom: 10px;}' +
			'div {font: 12px arial; color: black; display: block; padding: 3px; border: 1px solid #dedede; margin: 2px;}' +
			'</style>' +
			'<h1>' + title + '</h1>' +
			'<span>' + startDate + '</span>' + 
			'<div>' + description + '</div>' +
			'<input type="button" onclick="window.close();" value="Close" />' +
			"</body></html>";
			
			myWindow.document.write(html_table);
			return;	 
		} 
	}
}


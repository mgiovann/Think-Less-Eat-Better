/**************************************************************************
* Author: John Konecny
* Date Created: 6/7/2017
* Filename: mealBuilder.js
* Handles adds and deletes for SQL objects
***************************************************************************/
apiKey = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";

/**************************************************************************
* Adds event listener for search
***************************************************************************/
function bindButtons(){
	document.getElementById('foodSearchBtn').addEventListener('click', searchRequest);
}

//assigns get request to search button
function searchRequest(event){
	//xml request object to open weather
	var req = new XMLHttpRequest();
	
	//clear up the old search results
	var searchResults = document.getElementById('searchResults');
	clearNodeChildren(searchResults);
	searchResults.appendChild(createStatusEle("Loading Search Results..."));
	var searchStr = document.getElementById('foodSearchTxt').value;
	
    req.open('GET', 'https://api.nal.usda.gov/ndb/search/?format=json&q=' + searchStr + '&sort=n&max=10&offset=0&api_key=' + apiKey, true);
	
	//perform a get request to get the ndbno of food items which are relevant to searchStr
	req.addEventListener('load',function(){
      if(req.status >= 200 && req.status < 400){
			//clear loading header
			var searchResults = document.getElementById('searchResults');
			clearNodeChildren(searchResults);
			
			var reqs = [];
			var searchResultsObj = JSON.parse(req.responseText);
			
			//get food data for all search results
			for(i = 0; i < searchResultsObj.list.item.length; i++)
			{
				reqs[i] = new XMLHttpRequest();			
				reqs[i].open('GET', 'https://api.nal.usda.gov/ndb/reports/?ndbno=' + searchResultsObj.list.item[i].ndbno + '&type=b&format=json&api_key=' + apiKey, true);

				reqs[i].addEventListener('load',createGetHandler(reqs[i]));
				
				reqs[i].send(null);
				event.preventDefault();
				
			}
			for(i = 0; i < searchResultsObj.list.item.length; i++){
		
			}	
				
			
		} 
		else {
			var searchResults = document.getElementById('searchResults');
			clearNodeChildren(searchResults);
			searchResults.appendChild(createStatusEle("Search failed!"));
		}
	});
	
	req.send(null);
	event.preventDefault();
}

//handles the get requests by storing req within this function
//i.e. this is call within a loop of get request req will not be lost
function createGetHandler(req) {
    return function(){
				  if(req.status >= 200 && req.status < 400){
						var searchResults = document.getElementById('searchResults');
						
						var itemReport = JSON.parse(req.responseText);

						searchResults.appendChild(createResultForm(itemReport));
					} 
					else {
						var searchResults = document.getElementById('searchResults');
						searchResults.appendChild(createStatusEle("Search failed!"));
					}
				};
};


//removes all nodes of a given child
function clearNodeChildren(node)
{
	node = document.getElementById('searchResults');
	while (node.hasChildNodes()) {
		node.removeChild(node.lastChild);
	}
}

//creates an element with <h3> tags which displays msg
function createStatusEle(msg) {
    var header = document.createElement("h3");
    header.textContent = msg;
    return header;
}



//createResultFrom creates this:
/*<form action = "mealBuilder.php" method="post" onsubmit="return formvalidate(this);">
	<fieldset>                    
		<legend>FUN DIP, CANDY, CHERRY YUM DIDDLY DIP, RAZZ APPLE MAGIC DIP, UPC: 079200622411</legend>
			<input type="hidden" name="ndbno" value="45124695" readonly="readonly"/>				
			<input type="hidden" name="name" value="FUN DIP, CANDY, CHERRY YUM DIDDLY DIP, RAZZ APPLE MAGIC DIP, UPC: 079200622411" readonly="readonly"/>
			<label>Amount of Food</label>	
			<input type="number" name="amount" value="1" min="0"/>
			<label>Units of Amount (readonly)</label>
			<input type="text" name="ru" value="g" readonly="readonly"/>
			<label>Calories Per Unit (readonly)</label>
			<input type="number" name="energy" value="3.75" readonly="readonly"/>
			<input type="hidden" name="cmd" value="add" />				
			<input type="submit" class="add" value="add" />
	</fieldset>
</form>*/


//creates form for user to add a search result to
function createResultForm(itemReport) {
    var formEle = document.createElement("form");
	formEle.action = "mealBuilder.php";
	formEle.method = "post";
	fieldset = document.createElement("fieldset");
	
	
	//get all used information from itemReport
	obj = {};
	obj.ndbno = itemReport.report.food.ndbno;
	obj.name = itemReport.report.food.name;
	obj.ru = itemReport.report.food.ru;
	obj.energy = 0.0;
	
	//search for nutrients
	for(i = 0; i < itemReport.report.food.nutrients.length; i++)
	{
		if(itemReport.report.food.nutrients[i].nutrient_id == 208)
		{
			obj.energy = parseFloat(itemReport.report.food.nutrients[i].value) / 100;
		}
	}
	fieldset.appendChild(createLegendEle(obj.name));
	fieldset.appendChild(createInputEle("hidden", "ndbno", obj.ndbno, true));
	fieldset.appendChild(createInputEle("hidden", "name", obj.name, true));
	fieldset.appendChild(createLabelEle("Amount of Food"));
	fieldset.appendChild(createInputEle("number", "amount", 0, false));
	fieldset.appendChild(createLabelEle("Units of Amount (readonly)"));
	fieldset.appendChild(createInputEle("text", "ru", obj.ru, true));
	fieldset.appendChild(createLabelEle("Calories Per Unit (readonly)"));
	fieldset.appendChild(createInputEle("number", "energy", obj.energy, true));
    fieldset.appendChild(createInputEle("hidden", "cmd", "add", false));
	fieldset.appendChild(createInputEle("submit", "", "add", false));
	formEle.appendChild(fieldset);
	
    return formEle;
}

//creates a legend element
function createLegendEle(msg) {
    var legend = document.createElement("legend");
    legend.textContent = msg;
    return legend;
}

//creates a label element
function createLabelEle(msg) {
    var label = document.createElement("label");
    label.textContent = msg;
    return label;
}

//create an input element
function createInputEle(type, name, value, isReadonly) {
    var inputEle = document.createElement("input");
	inputEle.type = type;
	inputEle.name = name;
	inputEle.value = value;
	if(isReadonly)
	{
		inputEle.setAttribute("readOnly","readonly");
	}
	if(type == "number")
	{
		inputEle.min = 0;
	}
    return inputEle;
}


//binds all buttons
bindButtons();



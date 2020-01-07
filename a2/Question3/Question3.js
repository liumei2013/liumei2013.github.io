// ------------------------------------------------------------------------------
// Assignment 2 Question 3
// Written by: Mei Liu 40060940
// For SOEN 287 Section CC 2191 – Summer 2019
// -----------------------------------------------------------------------------

function parseInputData()
{
    var instr = document.getElementById("instring").value;
    var inword = document.getElementById("inword").value;
    if (instr == null || instr.length == 0 || inword == null || inword.length == 0)
    {
        alert("Please input string and word.");
        return;
    }
    
	//Remove the letters aren't in inword 
	var x = instr.split('');
    for (var i = x.length - 1; i >= 0; i--)
    {
        if (inword.indexOf(x[i]) == -1)
            x.splice(i, 1);
    }
    
    processForPlotly(x);
}

function processForPlotly(x)
{
	//Uncomment for the number version
	//var x = [2,5,6,3,4,2,3,4,2,3,4,5];
	//Uncoment for word version
	//var x = ["helo", "hello", "helo", "hi", "what"];

	var histElements = {
		x: x,
		type: "histogram",
		//opacity: 0.5,
		marker: {color: '#FFC300',},
	  };
  
	var layout = {
	  bargap: 0.05, 
	  bargroupgap: 0.5, 
	  barmode: "overlay", 
	  title: "Histogram", 
	  xaxis: {title: "Values",}, 
	  yaxis: {title: "Count"},			  
	};

	var data = [histElements];

	//Using ID for div to plot the graph
	Plotly.newPlot("graph", data, layout);
}

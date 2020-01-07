// ------------------------------------------------------------------------------
// Assignment 2 Question 2
// Written by: Mei Liu 40060940
// For SOEN 287 Section CC 2191 – Summer 2019
// -----------------------------------------------------------------------------

// the function check if String pair is anagram or not
function isAnagram(s1, s2)
{
	s1 = s1.toLowerCase();
	s2 = s2.toLowerCase();
	
	var s1a = s1.split('').sort();
	var s2a = s2.split('').sort();

	return s1a.join('') == s2a.join('');
}

// the function ask user to input string pairs
function inputData() 
{
	var so = document.getElementById("statsOut");
	var all=new Array();
	var entries = 0;
	while (true)
	{
		var str = prompt("Input your string (-1 for end):");
			
		if (str == null || str.length == 0) 
		{
			entries += 1;
			if (entries >= 5)
			{			
				so.innerHTML = "You have exceeded invalid entry limit.";
				return;
			}
			continue;
		}
		
		entries = 0;
		if (str == -1)
			break;
		
		all.push(str);
	}
	
	so.innerHTML = "You have entered below mentioned string pairs.<br/>";
	for (var i = 0; i < all.length / 2; i++)
	{
		var s1 = all[i * 2];
		var s2 = all[i * 2 + 1];
		if (s1 == undefined || s2 == undefined)
		{
			so.innerHTML += s1 + " is not a pairs.";
			break;
		}
		
		if (isAnagram(s1, s2))
			so.innerHTML += "Pairs " + s1 + " and " + s2 + " are anagrams.";
		else 
			so.innerHTML += "Pairs " + s1 + " and " + s2 + " are not anagrams.";
		so.innerHTML += "<br/>";
	}
}

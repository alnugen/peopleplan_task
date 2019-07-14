function Palindrome()
{
		var div = document.getElementById("message");
		var text = document.getElementById("input_text").value;
    var original = text.toLowerCase().split(''); // array of characters
		var toBeReversed = text.toLowerCase().split('');
		var reversed = toBeReversed.reverse(); // original word reversed
		for (var letter=0;letter<original.length;letter++){
			// compare original to reverse letters
			if (reversed[letter]!=original[letter]){
        div.innerHTML = "";
        div.innerHTML += "The input text " + text + " is not palindrome";
			  break; // not a palindrome end check
			} else if (letter == original.length-1){
        div.innerHTML = "";
        div.innerHTML += "The input text " + text + " is palindrome";
			}
		}
}

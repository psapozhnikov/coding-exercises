/**
 * 
 */
package test;

/**
 * @author Pavel
 *
 */
public class NumberTranslator {
	
	private final String[] lessThan20 = {
			"zero",
			"one",
			"two",
			"three",
			"four",
			"five",
			"six",
			"seven",
			"eight",
			"nine",
			"ten",
			"eleven",
			"twelve",
			"thirteen",
			"fourteen",
			"fifteen",
			"sixteen",
			"seventeen",
			"eighteen",
			"nineteen",
			};
	private final String[] tens = {"", "ten", "twenty", "thirty", "fourty", "fifty", "sixty", "seventy", "eighty", "ninety"};
	private final String[] powers = {"", "hundred", "thousand"};
	
	/**
	 * 
	 * @param number
	 * @return
	 */
	public String translateNumber(int number) {
		
		if (number == 0) return lessThan20[number];
		String result = "";
		
		result = helper(number);
		
		return result.trim();
	}
	
	/**
	 * 
	 * @param num
	 * @return
	 */
	private String helper(int num) {
		if (num == 0) {
			return "";
		}
		//if number is less than 20 just get the text from array
		if (num < 20) {
			return lessThan20[num];
		}
		
		if (num < 100) {
			return tens[num / 10] + " " + helper(num % 10);
		}
		
		if (num < 1000) {
			return lessThan20[num / 100] + " " + powers[1] + " " + helper(num % 100);
		}
		
		return lessThan20[num / 1000] + " " + powers[2] + " " + helper(num % 1000);
		
	}

}

package test;

import static org.junit.Assert.*;

import org.junit.Test;

public class NumberTranslatorTest {

	@Test
	public void test() {
		NumberTranslator numTrns = new NumberTranslator();
		assertEquals("five", numTrns.translateNumber(5));
		assertEquals("eleven", numTrns.translateNumber(11));
		assertEquals("twenty", numTrns.translateNumber(20));
		assertEquals("ninety nine", numTrns.translateNumber(99));
		assertEquals("nine hundred ninety nine", numTrns.translateNumber(999));
		assertEquals("one thousand nine hundred eighty two", numTrns.translateNumber(1982));
		assertEquals("one thousand nine hundred eighty one", numTrns.translateNumber(1981));
		assertEquals("two thousand twelve", numTrns.translateNumber(2012));
		assertEquals("two thousand fifteen", numTrns.translateNumber(2015));
	}

}

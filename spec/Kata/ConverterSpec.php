<?php

namespace spec\Kata;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConverterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kata\Converter');
    }

    function it_for_empty_string_throws_exception() 
    {
    	$this->shouldThrow(new \Exception())->during('convert',	array(""));
    }

    function it_throws_exception_for_other_type()
    {
    	$this->shouldThrow(new \Exception())->during('convert', array(0));
    	$this->shouldThrow(new \Exception())->during('convert', array(null));
    	$this->shouldThrow(new \Exception())->during('convert', array(array()));
    }

    function it_for_correct_string_with_length_one_returns_easy_numbers() {
    	$this->convert("I")->shouldReturn(1);
    	$this->convert("V")->shouldReturn(5);
    	$this->convert("X")->shouldReturn(10);
    	$this->convert("L")->shouldReturn(50);
    	$this->convert("C")->shouldReturn(100);
    	$this->convert("D")->shouldReturn(500);
    	$this->convert("M")->shouldReturn(1000);
    }

    function it_for_wrong_string_with_length_one_throws_exception() {
    	$this->shouldThrow(new \Exception())->during('convert', array("A"));
    	$this->shouldThrow(new \Exception())->during('convert', array("B"));
    	$this->shouldThrow(new \Exception())->during('convert', array("E"));
    	$this->shouldThrow(new \Exception())->during('convert', array("a"));
    	$this->shouldThrow(new \Exception())->during('convert', array("i"));
    	$this->shouldThrow(new \Exception())->during('convert', array("v"));
    	$this->shouldThrow(new \Exception())->during('convert', array("l"));
    	$this->shouldThrow(new \Exception())->during('convert', array("c"));
    	$this->shouldThrow(new \Exception())->during('convert', array("d"));
    	$this->shouldThrow(new \Exception())->during('convert', array("m"));
    }


    function it_for_correct_string_with_two_same_letters_i_or_x_return_proper_sum() {
    	$this->convert("II")->shouldReturn(2);
    	$this->convert("XX")->shouldReturn(20);

    }

    function it_for_wrong_string_with_two_same_letters_i_or_x_throws_exception() {
    	$this->shouldThrow(new \Exception())->during('convert', array("LL"));
    	$this->shouldThrow(new \Exception())->during('convert', array("CC"));
    	$this->shouldThrow(new \Exception())->during('convert', array("DD"));
    	$this->shouldThrow(new \Exception())->during('convert', array("MM"));
    	$this->shouldThrow(new \Exception())->during('convert', array("VV"));
    }

    function it_for_correct_string_with_two_different_letters_return_proper_sum() {
    	$this->convert("IV")->shouldReturn(4);
    	$this->convert("VI")->shouldReturn(6);
    	$this->convert("IX")->shouldReturn(9);
    	$this->convert("XI")->shouldReturn(11);
    	$this->convert("XL")->shouldReturn(40);
    	$this->convert("LI")->shouldReturn(51);
    	$this->convert("LV")->shouldReturn(55);
    	$this->convert("LX")->shouldReturn(60);
    	$this->convert("XC")->shouldReturn(90);
    }

    function it_for_correct_string_with_more_than_two_characters_return_proper_sum() {
    	$this->convert("VII")->shouldReturn(7);
    	$this->convert("XIII")->shouldReturn(13);
    	$this->convert("III")->shouldReturn(3);
    	$this->convert("XIX")->shouldReturn(19);
    	$this->convert("LXIX")->shouldReturn(69);
    	$this->convert("LXX")->shouldReturn(70);
    	$this->convert("LXXIV")->shouldReturn(74);
    	$this->convert("LXXVI")->shouldReturn(76);
    	$this->convert("XIV")->shouldReturn(14);

    	
    }

}

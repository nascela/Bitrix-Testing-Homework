<?php

// Задается произвольное целое число N.
// Необходимо вывести числа от 1 до N (включительно).
// В этом случае числа, которые делятся на 3, должны быть заменены строкой 'Foo',
// числа, которые делятся на 5, должны быть заменены строкой 'Bar'.
// Числа, которые делятся на 3 и на 5 - замените строкой 'FooBar'.
// Уточнения :
// 1) N - возможно отрицательное число;
// 2) 0 - делится на любое число.


function fooBar($n = ''): string
{
	if (!is_numeric($n))
	{
		throw new wrongInputException();
	}
	$result = [];
	$n <= 0 ? $step = -1 : $step = 1;

	for ($i = 1; $i != $n + $step; $i+= $step)
	{
		if ($i % 3 == 0 && $i % 5 !== 0)
		{
			$result[] = 'Foo';
		}
		elseif ($i % 5 == 0 && $i % 3 !== 0)
		{
			$result[] =  'Bar';
		}
		elseif ($i % 3 == 0 && $i % 5 == 0)
		{
			$result[] = 'FooBar';
		}
		else
		{
			$result[] =  $i;
		}
	}
	return implode(' ', $result);
}

echo fooBar(12);

class wrongInputException extends Exception
{
}




/**
 * Signed Profile
 *
 * @version 1.0
 * @author Benjamin Repingon
 * @copyright Copyright (c) 2014, Benjamin Repingon
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 *
 */

// SHAPES
Rectangle = function ( width, height, color )
{
	this.width = width;
	this.height = height;
	this.color = color;

	this.drawAt = function( png, x, y )
	{
		for ( var i = 0; i < width; i++ )
		{
			for ( var j = 0; j < height; j++ )
				png.set(i + x, j + y, color);
		}
	}
};

Line = function( p1, p2, color )
{
	this.drawAt = function ( png, i, j )
	{
		var dx = p2.x - p1.x;
		var dy = p2.y - p1.y;
		var d = 2 * dy - dx;
		var incrE = 2 * dy;
		var incrNE = 2 * (dy - dx);
		var x = p1.x;
		var y = p1.y;

		png.set(i + x, j + y, color);

		while(x < p2.x)
		{
			if (d <= 0)
			{
				d += incrE;
				x++;
			}
			else
			{
				d += incrNE;
				x++;
				y++;
			}
			png.set(i + x, j + y, color);
		}
	}
};

Triangle = function ( p1, p2, p3, color )
{
	this.color = color;
	this.drawAt = function( png, i, j )
	{
		if ( p2.y > p3.y )
		{
			p3.x = [p2.x, p2.x = p3.x][0];
			p3.y = [p2.y, p2.y = p3.y][0];
		}
		if ( p1.y > p2.y )
		{
			p2.x = [p1.x, p1.x = p2.x][0];
			p2.y = [p1.y, p1.y = p2.y][0];
		}
		if ( p2.y > p3.y )
		{
			p3.x = [p2.x, p2.x = p3.x][0];
			p3.y = [p2.y, p2.y = p3.y][0];
		}

		var dx_far = (p3.x - p1.x) / (p3.y - p1.y + 1);
		var dx_upper = (p2.x - p1.x) / (p2.y - p1.y + 1);
		var dx_low = (p3.x - p2.x) / (p3.y - p2.y + 1);
		var xf = p1.x;
		var xt = p1.x + dx_upper;
		for ( var y = p1.y; y <= (p3.y > png.height - 1 ? png.height - 1 : p3.y); y++ )
		{
			if ( y >= 0 )
			{
				for ( var x = (xf > 0 ? xf : 0); x <= (xt < png.width ? xt : png.width - 1); x++ )
					png.set(i + x, j + y, this.color);
				for ( var x = (xf < png.width ? xf : png.width - 1); x >= (xt > 0 ? xt : 0); x-- )
					png.set(i + x, j + y, this.color);
			}
			xf += dx_far;
			if ( y < p2.y )
				xt += dx_upper;
			else
				xt += dx_low;
		}
	}
};

// VECTOR
Point = function( x, y )
{
	this.x = x;
	this.y = y;
};

Random = function( a, b )
{
	return Math.floor(Math.random() * (b + 1)) + a;
};

// LETTERS

var letters = [
	// A
	[
		[[0, 0], [0, 0], [0, 0], [0, 0], [0, 0], [0, 1]],
		[[0, 0], [0, 0], [0, 0], [0, 0], [0, 1], [1, 1]],
		[[0, 0], [0, 0], [0, 0], [0, 1], [1, 0], [1, 1]],
		[[0, 0], [0, 0], [0, 1], [1, 1], [1, 1], [1, 1]],
		[[0, 0], [0, 1], [1, 0], [0, 0], [0, 0], [1, 1]],
		[[0, 1], [1, 0], [0, 0], [0, 0], [0, 0], [1, 1]]
	]
];

//Letter = function( char, color )
//{
//	var letter = letters[0];
//	this.drawAt = function( png, x, y )
//	{
//		for ( var i = 0; i < width; i++ )
//		{
//			for ( var j = 0; j < height; j++ )
//			{
//				if ( letter[] == 1 )
//					png.set(i + x, j + y, this.color);
//			}
//		}
//	}
//};
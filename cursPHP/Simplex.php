<? php
	$ nvar = $ _REQUEST [ " nvar " ];
	$ nres = $ _REQUEST [ " nres " ];
	$ obj = $ _REQUEST [ " objetivo " ];
	$ phase = $ _REQUEST [ " fase " ];
	$ iteracion = $ _REQUEST [ " iteracion " ];
	$ xpivote = $ _REQUEST [ " xpivote " ];
	$ matrix  =  $ _REQUEST [ " x " ];
	$ XT  =  $ _REQUEST [ " XT " ];
	
	// el pivote
	$ ypivote = 1 ;
	$ temp = $ _REQUEST [ " ratio " ] [ 1 ];
	for ( $ i = 1 ; $ i <= $ nres ; $ i ++ ) {
		if ( $ _REQUEST [ " ratio " ] [ $ i ] > 0  &&  $ _REQUEST [ " ratio " ] [ $ i ] < $ temp ) {
			$ temp = $ _REQUEST [ " ratio " ] [ $ i ];
			$ ypivote = $ i ;
		}
	}
	// Obteniendo pivote
		$ divisor = $ matrix [ $ ypivote ] [ $ xpivote ];
		// para la matriz X
		for ( $ i = 1 ; $ i <= ( $ nvar + $ nres + 1 ); $ i ++ ) {
			$ matrix [ $ ypivote ] [ $ i ] = $ matrix [ $ ypivote ] [ $ i ] / $ divisor ;
		}	
	// ==
	
	// sacando nueva matriz
	for ( $ k = 1 ; $ k <= $ nres + 1 ; $ k ++ ) {
		for ( $ i = 1 ; $ i <= ( $ nvar + $ nres + 1 ); $ i ++ ) {
			if ( $ k ! = $ ypivote ) {
				$ val = $ matriz [ $ k ] [ $ i ] - $ matriz [ $ ypivote ] [ $ i ] * $ matriz [ $ k ] [ $ xpivote ];
				$ nmatrix [ $ k ] [ $ i ] = $ val ;
			}
			más
				$ nmatrix [ $ k ] [ $ i ] = $ matriz [ $ k ] [ $ i ];
		}
	}
	// sacando Zeta
	// echo $ nmatrix [$ ypivote] [$ nvar + $ nres + 1] * $ matriz [$ nres + 1] [$ xpivote];
	// $ nmatrix [$ nres + 1] [$ nvar + $ nres + 1] = - $ nmatrix [$ nres + 1] [$ nvar + $ nres + 1];
	
	// sacando de nuevo el xpivote
	
		if ( $ obj == 0 )
			$ pivote = $ _REQUEST [ " z " ] [ 1 ]; // un numero demaciado positivo
		más
			$ pivote = - 10E10 ; // un valor demaciado negativo
			
		$ xpivote = 1 ;
		$ xvan = 0 ;
		for ( $ k = 1 ; $ k <= $ nvar ; $ k ++ ) {
			if ( $ obj == 0 ) {
				if ( $ nmatrix [ $ nres + 1 ] [ $ k ] > 0  &&  $ nmatrix [ $ nres + 1 ] [ $ k ] > $ pivote )
					$ xpivote = $ k ;
				más
					$ xvan ++ ;
			}
			else {
				if ( $ nmatrix [ $ nres + 1 ] [ $ k ] < 0  &&  $ nmatrix [ $ nres + 1 ] [ $ k ] < $ pivote )
					$ xpivote = $ k ;
				más
					$ xvan ++ ;
			}	
		}
	
	// para los valores de las X's
	$ XT [ $ xpivote ] = $ ypivote ;
? >
< h1 > Fase <? php echo $ phase ; ? > </ h1 >  
< div  class = " text " >
	< h2 > Iteración <? php echo $ iteracion ; ? > </ h2 >  
	< form  id = " iteraciones "  name = " iteraciones "  method = " post "  action = " simplex.php " >
		< input  type = " hidden "  name = " phase "  value = " <? php echo $ phase + 1 ; ? > "   >
		< input  type = " hidden "  name = " nvar "  value = " <? php echo $ nvar ; ? > "   >
		< input  type = " hidden "  name = " nres "  value = " <? php echo $ nres ; ? > "   >
		< input  type = " hidden "  name = " objetivo "  value = " <? php echo $ obj ; ? > "   >
		< input  type = " hidden "  name = " iteracion "  value = " <? php echo $ iteracion + 1 ; ? > "   >
		< input  type = " hidden "  name = " xpivote "  value = " <? php echo $ xpivote ; ? > "   >
		< mesa >
			< thead >
				< tr >
					< th > </ th >
					< th > </ th >
<? php
			for ( $ i = 1 ; $ i <= $ nvar ; $ i ++ ) {
				echo  "
					<th> X <sub> $ i </ sub> </ th>
				" ;
			}
? >
<? php
			for ( $ i = 1 ; $ i <= $ nres ; $ i ++ ) {
				echo  "
					<th> C <sub> $ i </ sub> </ th>
				" ;
			}
? >					
					< th > </ th >
					< th > </ th >
				</ tr >
				< tr >
					< th > Base </ th >
					< th > C (j) </ th >
<? php
			for ( $ i = 1 ; $ i <= ( $ nvar + $ nres ); $ i ++ ) {
				$ temp  =  $ nmatrix [ $ nres + 1 ] [ $ i ];
				echo  "
					<th>
						-
					</ th>
				" ;
			}
? >
					< th > RHS </ th >
					< th > Ratio </ th >
				</ tr >
			</ thead >
			< tbody >
<? php
		for ( $ r = 1 ; $ r <= $ nres ; $ r ++ ) {
			echo  "
				<tr>
					<td> <b> C <sub> 1 </ sub> </ b> </ td>
					<td> <b> 0 </ b> </ td> " ;
			for ( $ i = 1 ; $ i <= ( $ nvar + $ nres + 1 ); $ i ++ ) {
				$ temp  =  $ nmatrix [ $ r ] [ $ i ];
				echo  "
					<td>
						<input type = 'text' size = '2' maxlength = '10 'name =' x [ $ r ] [ $ i ] 'id =' x [ $ r ] [ $ i ] 'valor =' $ temp 'de solo lectura />
					</ td>
				" ;
			}
			$ _rhs = $ nmatrix [ $ r ] [ $ nres + $ nvar + 1 ];
			
			$ _ratio = ( $ nmatrix [ $ r ] [ $ ypivote ]) == 0 ? " M " :( $ _rhs / $ nmatrix [ $ r ] [ $ ypivote ]);
			// $ _ratio = ($ _ rhs / $ nmatrix [$ r] [$ ypivote]): 0;
			echo  "
					<td>
						<input type = 'text' size = '2' maxlength = '10 'name =' ratio [ $ r ] 'id =' ratio [ $ r ] 'value =' $ _ratio 'readonly />
					</ td>
				</ tr>
			" ;
		}
? >
				< tr >
					< td > </ td >
					< td > < b > C (j) -Z (i) </ b > </ td >
<? php
			for ( $ i = 1 ; $ i <= ( $ nvar + $ nres ); $ i ++ ) {
				$ temp  =  $ nmatrix [ $ nres + 1 ] [ $ i ];
				echo  "
					<td>
						<input type = 'text' size = '2' maxlength = '10 'name =' x [ " . ( $ nres + 1 ) . " ] [ $ i ] 'id =' x [ " . ( $ nres + 1 ) . " ] [ $ i ] 'value =' $ temp 'sólo lectura />
					</ td>
				" ;
			}
			// imprimiendo la Z
			echo  "
					<td>
						<input type = 'hidden' size = '2' maxlength = '10 'name =' x [ " . ( $ nres + 1 ) . " ] [ " . ( $ nvar + $ nres + 1 ) . " ] 'id = 'x [ " . ( $ nres + 1 ) . " ] [ " . ( $ nvar + $ nres + 1 ) . " ]' value = ' " .$ nmatrix [ $ nres + 1 ] [$ nvar + $ nres + 1 ] . " 'readonly />
						<input type = 'text' size = '2' maxlength = '10 'value =' " . ( - $ nmatrix [ $ nres + 1 ] [ $ nvar + $ nres + 1 ]) . " 'readonly />
					</ td>
				" ;
? >

					< td > </ td >
				</ tr >				
			</ tbody >
		</ table >
		< div  class = " part " >
			< input  type = " button "  value = " Anterior "  onclick = " history.go (-1); " />
<? php
	if ( $ xvan ! = $ nvar )
		echo  "
			<input type = 'submit' value = 'Siguiente' />
		" ;
? >
		</ div >
	</ form >
<? php
	if ( $ xvan == $ nvar ) {
		echo  " <p> Punto Óptimo Alcanzado. Resultados: </ p> " ;
		for ( $ i = 1 ; $ i <= $ nvar ; $ i ++ ) {
			$ xn = round ( $ nmatrix [ $ XT [ $ i ]] [ $ nvar + $ nres + 1 ] == " " ? " 0 " : $ nmatrix [ $ XT [ $ i ]] [ $ nvar + $ nres + 1 ], 2 );
			echo  " <p> X <sub> $ i </ sub> = $ xn </ p> " ;
		}
		$ Zf = round ( - $ nmatrix [ $ nres + 1 ] [ $ nvar + $ nres + 1 ], 2 );
		echo  " <p> Z = $ Zf </ p> " ;
	}
? >	
</ div >
select  Pokoj.nrPokoju, Pietro.ktorePietro, WidokZOkna.Widok
from Hotel 
join Pietro on Hotel.idHotel = Pietro.Hotel_idHotel 
join Pokoj on Pokoj.Pietro_idPietro = Pietro.idPietro
join StandardPokoju on Pokoj.StandardPokoju_idStandardPokoju = StandardPokoju.idStandardPokoju
join WidokZOkna on WidokZOkna.idWidokZOkna = Pokoj.WidokZOkna_idWidokZOkna
join Zamowienie on Pokoj.nrPokoju = Zamowienie.Pokoj_nrPokoju
where 
	Hotel.nazwa = 'Srebrna toń'
	and StandardPokoju.StandardPokoju = 'Standard'
	and StandardPokoju.maxLiczbaOsob <= 5
	and Pokoj.nrPokoju not in  (select Pokoj.nrPokoju 
							from Hotel 
							inner join Pietro on Hotel.idHotel = Pietro.Hotel_idHotel 
							join Pokoj on Pokoj.Pietro_idPietro = Pietro.idPietro
							join StandardPokoju on Pokoj.StandardPokoju_idStandardPokoju = StandardPokoju.idStandardPokoju
							join Zamowienie on Pokoj.nrPokoju = Zamowienie.Pokoj_nrPokoju
                            where 
								 (Zamowienie.data_od <= '2018-08-15' and Zamowienie.data_do >= '2018-08-20'))
group by Pokoj.nrPokoju,Pietro.ktorePietro, WidokZOkna.Widok;
					




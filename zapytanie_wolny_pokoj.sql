	/*select  Hotel.nazwa, Hotel.adres_miasto, Hotel.idHotel, WidokZOkna.Widok, Pokoj.Cena, Pokoj.nrPokoju
        from Hotel 
        inner join Pietro on Hotel.idHotel = Pietro.Hotel_idHotel 
        join Pokoj on Pokoj.Pietro_idPietro = Pietro.idPietro
        join WidokZOkna on WidokZOkna.idWidokZOkna =  Pokoj.WidokZOkna_idWidokZOkna
        join StandardPokoju on Pokoj.StandardPokoju_idStandardPokoju = StandardPokoju.idStandardPokoju
        join Zamowienie on Pokoj.nrPokoju = Zamowienie.Pokoj_nrPokoju
        where StandardPokoju.StandardPokoju = '$standard'
	and $pers_num <= StandardPokoju.maxLiczbaOsob 
        and Hotel.lokalizacja = '$place'
        and ((Zamowienie.data_od >= '$arr_date' and Zamowienie.data_od >= '$dep_date')
        or (Zamowienie.data_do <= '$arr_date' and Zamowienie.data_do <= '$dep_date'));*/
	
	select Hotel.nazwa, Hotel.adres_miasto, Hotel.idHotel,  Pokoj.Cena, Pokoj.nrPokoju
	from Hotel 
	join Pietro on Hotel.idHotel = Pietro.Hotel_idHotel 
	join Pokoj on Pokoj.Pietro_idPietro = Pietro.idPietro
	join StandardPokoju on Pokoj.StandardPokoju_idStandardPokoju = StandardPokoju.idStandardPokoju
	join Zamowienie on Pokoj.nrPokoju = Zamowienie.Pokoj_nrPokoju
	where 
		StandardPokoju.StandardPokoju = 'Standard'
		and StandardPokoju.maxLiczbaOsob <= 5
		and Hotel.lokalizacja = 'Mazury' 
		and Pokoj.nrPokoju not in  (select Pokoj.nrPokoju 
			from Hotel 
			inner join Pietro on Hotel.idHotel = Pietro.Hotel_idHotel 
			join Pokoj on Pokoj.Pietro_idPietro = Pietro.idPietro
			join StandardPokoju on Pokoj.StandardPokoju_idStandardPokoju = StandardPokoju.idStandardPokoju
			join Zamowienie on Pokoj.nrPokoju = Zamowienie.Pokoj_nrPokoju
                            where (Zamowienie.data_od <= '2018-08-15' and Zamowienie.data_do >= '2018-08-20'))
group by Pokoj.nrPokoju,Hotel.nazwa, Hotel.adres_miasto, Hotel.idHotel,  Pokoj.Cena;


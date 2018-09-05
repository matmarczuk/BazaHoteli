select  Hotel.nazwa, Hotel.lokalizacja, WidokZOkna.Widok, Pokoj.Cena
from Hotel 
inner join Pietro on Hotel.idHotel = Pietro.Hotel_idHotel 
join Pokoj on Pokoj.Pietro_idPietro = Pietro.idPietro
join WidokZOkna on WidokZOkna.idWidokZOkna =  Pokoj.WidokZOkna_idWidokZOkna
join StandardPokoju on Pokoj.StandardPokoju_idStandardPokoju = StandardPokoju.idStandardPokoju
join Zamowienie on Pokoj.nrPokoju = Zamowienie.Pokoj_nrPokoju
where StandardPokoju.StandardPokoju = 'Apartament'
	and StandardPokoju.maxLiczbaOsob <= 5
    and Hotel.lokalizacja = 'Mazury'
    and ((Zamowienie.data_od >= '2018-05-02' and Zamowienie.data_od >= '2018-05-03')
		or (Zamowienie.data_do <= '2018-05-02' and Zamowienie.data_do <= '2018-05-03'));
    



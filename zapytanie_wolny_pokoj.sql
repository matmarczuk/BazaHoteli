select  count(Pokoj_nrPokoju)
from Hotel 
inner join Pietro on Hotel.idHotel = Pietro.Hotel_idHotel 
join Pokoj on Pokoj.Pietro_idPietro = Pietro.idPietro
join StandardPokoju on Pokoj.StandardPokoju_idStandardPokoju = StandardPokoju.idStandardPokoju
join Zamowienie on Pokoj.nrPokoju = Zamowienie.Pokoj_nrPokoju
where Hotel.nazwa = 'Srebrna to┼ä'
	and StandardPokoju.StandardPokoju = 'Apartament'
	and standardpokoju.maxLiczbaOsob <= 5
    and hotel.lokalizacja = 'Mazury'
    and ((Zamowienie.data_od >= '2018-05-02' and Zamowienie.data_od >= '2018-05-03')
		or (Zamowienie.data_do <= '2018-05-02' and Zamowienie.data_do <= '2018-05-03'));
    



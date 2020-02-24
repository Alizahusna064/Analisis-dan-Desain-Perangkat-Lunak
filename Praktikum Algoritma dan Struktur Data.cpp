#include<iostream>
using namespace std;

int main(){
	struct pembeli{
		string kode_pbl;
		string status;
		string nama;
	};

	pembeli p[100];
	p[0].kode_pbl="P001";
	p[0].status = "M";
	p[0].nama = "Diana";
	p[1].kode_pbl="P002";
	p[1].status = "M";
	p[1].nama = "Rina";
	p[2].kode_pbl="P003";
	p[2].status = "BM";
	p[2].nama = "Lina";
	p[3].kode_pbl="P004";
	p[3].status = "BM";
	p[3].nama = "Doni";
	p[4].kode_pbl="P005";
	p[4].status = "M";
	p[4].nama = "Dodi";
	int jumlah_pembeli=5;

	struct barang{
		string kode_brg;
		string nama_brg;
		int harga;
	};
	barang b[100];
	b[0].kode_brg="BRG001";
	b[0].nama_brg = "Pensil";
	b[0].harga = 2000;
	b[1].kode_brg="BRG002";
	b[1].nama_brg = "Buku Tulis";
	b[1].harga = 3500;
	b[2].kode_brg="BRG003";
	b[2].nama_brg = "Penghapus";
	b[2].harga = 1000;
	b[3].kode_brg="BRG004";
	b[3].nama_brg = "Penggaris";
	b[3].harga = 1500;
	b[4].kode_brg="BRG005";
	b[4].nama_brg = "Ballpoint";
	b[4].harga = 2500;
	int jumlah_barang = 5;

	string input_kode_pembeli;
	cout<<"Kode Pembeli : ";
	cin>>input_kode_pembeli;
	int index_kode_pembeli=0;
	for(int a=0;a<jumlah_pembeli;a++)
	{
		if(p[a].kode_pbl == input_kode_pembeli)
		{
			index_kode_pembeli = a;
			break;
		}
	}
	cout<<"Nama Pembeli : "<<p[index_kode_pembeli].nama<<endl;
	cout<<"Status Pembeli : "<<p[index_kode_pembeli].status<<endl;

	string input_kode_barang;
	cout<<endl;
	cout<<"Kode Barang : ";
	cin>>input_kode_barang;
	int index_kode_barang=0;
	for(int x=0;x<jumlah_barang;x++)
	{
		if(b[x].kode_brg == input_kode_barang)
		{
			index_kode_barang = x;
			break;
		}
	}
	cout<<"Nama Barang : "<<b[index_kode_barang].nama_brg<<endl;
	cout<<"Harga Barang : "<<b[index_kode_barang].harga<<endl;
	int jumlah_barang_beli;
	cout<<"Jumlah Barang : ";
	cin>>jumlah_barang_beli;

	cout<<"Sub Total : "<<jumlah_barang_beli<<" x "<<b[index_kode_barang].harga<<endl;
	cout<<endl;
	int total = jumlah_barang_beli * b[index_kode_barang].harga;
	cout<<"Total Pembelian : "<<total<<endl;
	int diskon = 0;
	if(p[index_kode_pembeli].status == "M")
	{
		diskon = (total * 10)/100;
	}
	cout<<"Diskon : "<<diskon<<endl;
	int potongan = 0;
	if(jumlah_barang_beli > 3)
	{
		potongan = 300;
	}
	cout<<"Potongan : "<<potongan<<endl;
	int total_bayar;
	total_bayar = total - diskon - potongan;
	cout<<"Total harus dibayar : "<<total_bayar<<endl;
	int jumlah_bayar;
	cout<<"Jumlah Bayar : ";
	cin>>jumlah_bayar;
	int kembalian = jumlah_bayar - total_bayar;
	cout<<"Kembalian : "<<kembalian<<endl;



}


let kata = "ABCDE";
console.log(kata.charAt(0));
console.log(kata.charAt(4));
console.log(kata.charAt(3));
console.log(kata.charAt(5));


let namaLengkap = "Ucup Surucup";
console.log (namaLengkap.indexOf("S"));


let namaDepan = "Ucup";
let namaBelakang = "Surucup";
console.log(namaDepan.concat(" " + namaBelakang + "Si Kecil"))

// Mengambil potongan string 
let kata1 = "Ucup suka sama rara, racupppppppppp";
console.log(kata1.substring(21, 28));
console.log(kata1.slice(21,28));
console.log(kata1.substring(28,21));
console.log(kata1.slice(28,21));

// Merubah isi string
namaLengkap = namaLengkap.replace("rucup", "Racupp");
console.log(namaLengkap);

// Merubah semua huruf menjadi huruf kecil atau huruf besar
console.log(namaLengkap.toLowerCase());
console.log(namaLengkap.toUpperCase());

//presisi transmutasi angka
let a = "10.3";
let b = parseInt(a);
console.log(typeof a); //string
console.log(typeof b); //number
console.log(b + 4);

//presisi trasmutasi desimal
let c = "10.3";
console.log(parseFloat(c));


//latihan LKPD
console.log("bawah ni");
console.log("Halo Dunia".length);
console.log("  Coding Itu Seru  ".trim());
console.log("kucing".indexOf("c"));
console.log("belajar".includes("jar"));

let sapaan = "Selamat";
let waktu = "Pagi";
let hasil = sapaan + " " + waktu;
console.log(hasil); // Selamat Pagi

let nama = "Andi";
let pekerjaan = "Programmer";
console.log("Nama Saya " + nama + ", saya bekerja sebagai " + pekerjaan + ".");
//atau bisa pake ini
console.log(`Nama saya ${nama}, saya bekerja sebagai ${pekerjaan}.`);

let email = "andi@example.com";
console.log(email.includes("@")); //true
let email2 = "andi.example.com";
console.log(email2.includes("@")); //false

let kalimat = "Rara suka sama ucup, tapi ucup tidak suka sama rara";
console.log(kalimat.split(" "));
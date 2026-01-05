// Pemetaan karakter yang diorganisir berdasarkan panjang untuk optimasi
const characterMap = {
    // 4 huruf dengan a
    ngha: "K",
    ngka: "K",
    ngga: "G",
    ngsa: "S",
    ntra: "TR",

    // 3 huruf dengan a
    nta: "T",
    nca: "C",
    nda: "D",
    mpa: "P",
    mba: "B",
    nja: "J",
    nya: "Y",
    nga: "N",

    // 2 huruf dengan a
    ka: "k",
    ga: "g",
    ta: "t",
    da: "d",
    na: "n",
    pa: "p",
    ba: "b",
    ma: "m",
    ca: "c",
    ja: "j",
    sa: "s",
    ra: "r",
    la: "l",
    wa: "w",
    ya: "y",
    ha: "h",
    qa: "q",
    fa: "p",
    va: "p",
    za: "j",

    // 4 huruf dengan e
    nghe: "K",
    ngke: "K",
    ngge: "G",
    ngse: "S",
    ntre: "TR",

    // 3 huruf dengan e
    nte: "T",
    nce: "C",
    nde: "D",
    mpe: "P",
    mbe: "B",
    nje: "J",
    nye: "Y",
    nge: "N",

    // 2 huruf dengan e
    ke: "k",
    ge: "g",
    te: "t",
    de: "d",
    ne: "n",
    pe: "p",
    be: "b",
    me: "m",
    ce: "c",
    je: "j",
    se: "s",
    re: "r",
    le: "l",
    we: "w",
    ye: "y",
    he: "h",
    qe: "q",
    fe: "p",
    ve: "p",
    ze: "j",

    // 3 huruf tanpa a
    ngh: "K",
    ngk: "K",
    ngg: "G",
    ngs: "S",
    ntr: "TR",

    // 2 huruf tanpa a
    nt: "T",
    nc: "C",
    nd: "D",
    mp: "P",
    mb: "B",
    nj: "J",
    ny: "Y",
    ng: "N",

    // konsonan tunggal
    k: "k",
    g: "g",
    t: "t",
    d: "d",
    n: "n",
    p: "p",
    b: "b",
    m: "m",
    c: "c",
    j: "j",
    s: "s",
    r: "r",
    l: "l",
    w: "w",
    y: "y",
    h: "h",
    q: "q",
    f: "p",
    v: "p",
    z: "s",

    // vokal
    a: "a",
    i: "L",
    u: "u",
    e: "a",
    o: "u",
};

let debugInfo = "";

function isVowel(char) {
    return "aiueo".includes(char.toLowerCase());
}

function isConsonant(char) {
    return /[bcdfghjklmnpqrstvwxyz]/i.test(char);
}

function convertToIncung() {
    const input = document.getElementById("latin-input").value;
    const output = document.getElementById("incung-output");

    if (!input.trim()) {
        output.value = "";
        return;
    }

    let result = "";

    // Pisahkan berdasarkan kata (spasi dan tanda baca)
    const words = input.split(/(\s+|[.,!?;:'"=+\-_*&^%$#@~\[\]\{\}\(\)])/);
    for (let wordIndex = 0; wordIndex < words.length; wordIndex++) {
        const word = words[wordIndex];

        // Jika spasi tambahkan langsung
        if (/^\s+$/.test(word)) {
            result += word;
            continue;
        }

        // Jika tanda baca kosong (skip)
        if (/^[.,!?;:'"=+\-_*&^%$#@~\[\]\{\}\(\)]+$/.test(word)) {
            continue;
        }

        // Selain itu (huruf kecil maupun kapital) tetap konversi
        result += convertWord(word);
    }

    output.value = result;

    output.classList.add("animation-fade");
    setTimeout(() => {
        output.classList.remove("animation-fade");
    }, 500);
}

function convertWord(word) {
    if (!word) return "";

    let result = "";
    let i = 0;
    const wordLower = word.toLowerCase();

    while (i < word.length) {
        let found = false;

        // LOGIKA UTAMA: Cek kombinasi huruf dari yang terpanjang (4) ke terpendek (1)
        for (let len = Math.min(4, word.length - i); len >= 1; len--) {
            const substring = wordLower.substring(i, i + len); // Gunakan wordLower
            const isAtEnd = i + len === word.length;
            const isAtStart = i === 0;
            const isInMiddle = !isAtStart && !isAtEnd;
            const nextChar = wordLower.charAt(i + len);
            const prevChar = i > 0 ? wordLower.charAt(i - 1) : "";

            // Penanganan khusus untuk kombinasi 'ih'
            if (substring === "ih") {
                if (isAtEnd) {
                    result += "HL";
                } else {
                    result += "Lh";
                }
                i += 2;
                found = true;
                break;
            }

            if (characterMap[substring]) {
                let mappedChar = characterMap[substring];

                // Vokal di awal kata
                if (isAtStart && len === 1 && isVowel(substring)) {
                    if (substring === "a" || substring === "e") {
                        result += "a";
                    } else {
                        result += "a" + characterMap[substring];
                    }
                    i += len;
                    found = true;
                    break;
                }

                // Konsonan tunggal dengan aturan posisi
                if (len === 1 && isConsonant(substring)) {
                    if (isAtEnd) {
                        if (substring === "h") {
                            mappedChar = "H"; // Huruf mati khusus untuk 'h'
                        } else {
                            mappedChar = mappedChar + "X"; // Huruf mati umum
                        }
                    }
                }

                if (len === 2 && isConsonant(substring)) {
                    if (isAtEnd) {
                        if (substring === "ng") {
                            mappedChar = "M"; // Khusus untuk akhiran 'ng'
                        }
                    }
                }

                // vokal di tengah kata
                if (len === 1 && isConsonant(substring)) {
                    if (isInMiddle) {
                        if (nextChar && isConsonant(nextChar)) {
                            mappedChar = mappedChar + "X";
                        } else if (
                            nextChar &&
                            isVowel(nextChar) &&
                            !"iueo".includes(nextChar)
                        ) {
                            mappedChar = mappedChar + "X";
                        }
                    }
                }

                // Penanganan vokal setelah vokal lain - PERBAIKAN SEMUA OPERATOR
                if (
                    len === 1 &&
                    isVowel(substring) &&
                    prevChar &&
                    isVowel(prevChar)
                ) {
                    if (isInMiddle) {
                        if (
                            prevChar === "a" &&
                            (substring === "i" || substring === "e")
                        ) {
                            result = result + "yL";
                        } else if (
                            prevChar === "a" &&
                            (substring === "u" || substring === "o")
                        ) {
                            result = result + "hu";
                        } else if (prevChar === "i" && substring === "a") {
                            result = result + "y";
                        } else if (prevChar === "i" && substring === "e") {
                            result = result;
                        } else if (
                            prevChar === "i" &&
                            (substring === "u" || substring === "o")
                        ) {
                            result = result + "yu";
                        } else if (
                            prevChar === "u" &&
                            (substring === "a" || substring === "o")
                        ) {
                            result = result + "w";
                        } else if (prevChar === "u" && substring === "i") {
                            result = result + "yL";
                        } else if (prevChar === "u" && substring === "e") {
                            result = result + "wL";
                        } else if (prevChar === "e" && substring === "a") {
                            result = result + "Ly";
                        } else if (prevChar === "e" && substring === "i") {
                            result = result + "L";
                        } else if (prevChar === "e" && substring === "u") {
                            result = result + "yu";
                        } else if (prevChar === "e" && substring === "o") {
                            result = result + "hu";
                        } else if (prevChar === "o" && substring === "a") {
                            result = result + "w";
                        } else if (
                            prevChar === "o" &&
                            (substring === "i" || substring === "e")
                        ) {
                            result = result + "yL";
                        } else if (prevChar === "o" && substring === "u") {
                            result = result + "hu";
                        } else {
                            result += mappedChar;
                        }
                        i += len;
                        found = true;
                        break;
                    }
                    if (isAtEnd) {
                        if (
                            prevChar === "a" &&
                            (substring === "i" || substring === "e")
                        ) {
                            result = result + "yX";
                        } else if (
                            prevChar === "a" &&
                            (substring === "u" || substring === "o")
                        ) {
                            if (i === 2) {
                                result = result + "hu";
                            } else {
                                result = result + "wX";
                            }
                        } else if (prevChar === "i" && substring === "a") {
                            result = result + "y";
                        } else if (prevChar === "i" && substring === "e") {
                            result = result;
                        } else if (
                            prevChar === "i" &&
                            (substring === "u" || substring === "o")
                        ) {
                            result = result + "yu";
                        } else if (
                            prevChar === "u" &&
                            (substring === "a" || substring === "o")
                        ) {
                            result = result + "uw";
                        } else if (prevChar === "u" && substring === "i") {
                            result = result + "uyX";
                        } else if (prevChar === "u" && substring === "e") {
                            result = result + "wL";
                        } else if (prevChar === "e" && substring === "a") {
                            result = result + "Ly";
                        } else if (prevChar === "e" && substring === "i") {
                            result = result + "L";
                        } else if (prevChar === "e" && substring === "u") {
                            result = result + "wX";
                        } else if (prevChar === "e" && substring === "o") {
                            result = result + "LwX";
                        } else if (prevChar === "o" && substring === "a") {
                            result = result + "uw";
                        } else if (
                            prevChar === "o" &&
                            (substring === "i" || substring === "e")
                        ) {
                            result = result + "uyX";
                        } else if (prevChar === "o" && substring === "u") {
                            result = result + "hu";
                        } else {
                            result += mappedChar;
                        }
                        i += len;
                        found = true;
                        break;
                    }
                }

                result += mappedChar;
                i += len;
                found = true;
                break;
            }
        }

        // Jika tidak ditemukan pemetaan, gunakan karakter asli
        if (!found) {
            result += word.charAt(i);
            i++;
        }
    }

    // Panggil aturan tambahan per suku kata
    return applySukuKataRules(word, result);
}

function applySukuKataRules(word, converted) {
    // Pisahkan kata asli menjadi suku kata sederhana: (konsonan* + vokal)
    const syllables = word.toLowerCase().match(/[^aiueo]*[aiueo]/g) || [
        word.toLowerCase(),
    ];

    for (let i = 0; i < syllables.length - 1; i++) {
        const current = syllables[i];
        const next = syllables[i + 1];

        // cari vokal di setiap suku kata
        const v1 = current.match(/[aiueo]/)?.[0];
        const v2 = next.match(/[aiueo]/)?.[0];

        if (v1 === "a" && v2 === "o") {
            // hapus semua "u" dari hasil konversi
            converted = converted.replace(/u/g, "");
        } else if (v1 === "u" && v2 === "o") {
            // hapus "u" terakhir dari hasil konversi
            converted = converted.replace(/u(?!.*u)/, "");
        }
    }

    return converted;
}

function copyIncungText(btn) {
    const output = document.getElementById("incung-output");
    const btnText = btn.querySelector("#copy-btn-text");

    if (!output.value.trim()) return;

    navigator.clipboard.writeText(output.value).then(() => {
        const originalText = btnText.innerText;
        btnText.innerText = "TERSALIN!";

        output.style.backgroundColor =
            "color-mix(in srgb, var(--p), transparent 85%)";

        setTimeout(() => {
            btnText.innerText = originalText;
            if (output.value.trim()) {
                output.style.backgroundColor = "transparent";
            }
        }, 2000);
    });
}

function clearAll() {
    document.getElementById("latin-input").value = "";
    const output = document.getElementById("incung-output");
    output.value = "";
    output.style.backgroundColor = "transparent";
}

function convertTextToIncung(text) {
    if (!text) return "";
    const words = text.split(/(\s+|[.,!?;:])/);
    let result = "";
    for (let i = 0; i < words.length; i++) {
        const word = words[i];
        if (/^\s+$/.test(word) || /^[.,!?;:]+$/.test(word)) {
            result += word;
        } else {
            result += convertWord(word);
        }
    }
    return result;
}

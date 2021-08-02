<?php

namespace Tests\Fhp\Integration\KSK\Biberach;

use Tests\Fhp\FinTsTestCase;

class KskBiberachIntegrationTestBase extends FinTsTestCase
{
    const TEST_BANK_CODE = '65450070';
    const TEST_TAN_MODE = '910';

    // Anonymous dialog to fetch BPD (HKVVB, then HKEND).
    const ANONYMOUS_INIT_REQUEST = "HNHBK:1:3+000000000145+300+0+1'HKIDN:2:2+280:65450070+9999999999+0+0'HKVVB:3:3+0+0+0+123456789ABCDEF0123456789+1.0'HKTAN:4:6+4+HKIDN'HNHBS:5:1+1'";
    const ANONYMOUS_INIT_RESPONSE = "HNHBK:1:3+000000011086+300+993293908577=281256812352BRKW=+1+993293908577=281256812352BRKW=:1'HIRMG:2:2+3060::Bitte beachten Sie die enthaltenen Warnungen/Hinweise.+0100::Dialog beendet.'HIRMS:3:2:3+3050::BPD nicht mehr aktuell, aktuelle Version enthalten.+0020::Informationen fehlerfrei entgegengenommen.'HIBPA:4:3:3+8+280:65450070+Kreissparkasse Biberach+3+1+300'HIKOM:5:4:3+280:65450070+1+3:banking-bw3.s-fints-pt-bw.de/fints30+2:banking-bw3.s-fints-pt-bw.de::MIM:1'HISHV:6:3:3+N+DDV:1+PIN:1'HICSUS:7:1:3+1+1+1+INTC;CORT:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.003.03:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.001.03'HIPKBS:8:1:3+1+1+1+N'HIPKAS:9:1:3+1+1+1+N:N:N:N:N:N:N:N:N:N:N'HIPCRS:10:1:3+1+1+1'HIPWES:11:1:3+1+1+1+J'HIPWLS:12:1:3+1+1+1+N:J:J'HIPWBS:13:1:3+1+1+1+N:N'HIPWAS:14:1:3+1+1+1+J'HIBMBS:15:1:3+1+1+1+J:J'HIDMLS:16:1:3+1+1+1'HIBMLS:17:1:3+1+1+1'HIDMBS:18:1:3+1+1+1+J:J'HIIPZS:19:1:3+1+1+1+;:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.001.03'HIIPSS:20:1:3+1+1+1+10:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.001.03'DIWOKS:21:1:3+1+1+1+9999999,99:EUR'DIWDHS:22:1:3+1+1+1+J:N:730'DIBVES:23:1:3+1+1+1+E'DIPTZS:24:1:3+1+1+1+J'DIEEAS:25:1:3+1+1+1+DKPTZ:1:N'DIALES:26:1:3+1+1+1+V-EC-KARTE:V-S-CARD:V-WERTKARTE'DIALLS:27:1:3+1+1+1'DIALNS:28:1:3+1+1+1+V-EC-KARTE:V-S-CARD:V-WERTKARTE'DIANAS:29:1:3+1+1+1+1:15'DIANLS:30:1:3+1+1+1'DIBAZS:31:2:3+1+1+1+J:J'DIBKDS:32:4:3+1+1+1'DIBKUS:33:3:3+1+1+1+J:N'DIBUMS:34:3:3+1+1+1+N'DIBVAS:35:1:3+1+1+1'DIBVBS:36:1:3+1+1+1'DIBVDS:37:1:3+1+1+1'DIBVKS:38:1:3+1+1+1+J:V-EC-KARTE:V-S-CARD:V-WERTKARTE'DIBVPS:39:1:3+1+1+1+8:20'DIBVRS:40:1:3+1+1+1+8:20::N:N'DIBVSS:41:1:3+1+1+1'DIBVSS:42:2:3+1+1+1'DIDFAS:43:1:3+1+1+1+N'DIDFBS:44:1:3+1+1+1'DIDFCS:45:1:3+1+1+1'DIDFDS:46:1:3+1+1+1'DIDFLS:47:1:3+1+1+1'DIDFUS:48:1:3+1+1+1+N'DIDFUS:49:2:3+1+1+1+N'DIDIHS:50:1:3+1+1+1'DIDFSS:51:2:3+1+1+1+N:1;DekaBank-Konzern;5;Swisscanto;7;JPMorgan Fleming;8;Lombard Odier;10;Franklin Templeton;11;Gartmore;12;Goldman Sachs;13;Black Rock Merrill;14;Threadneedle;15;UBS;16;Schroders:10_10:Aktienfonds Asien - Pazifik ohne Japan:10_20:Aktienfonds Branche:10_30:Aktienfonds Deutschland:10_40:Aktienfonds Emerging Markets:10_50:Aktienfonds Euroland:10_60:Aktienfonds Europa L�nder:10_70:Aktienfonds Europa:10_80:Aktienfonds Japan:10_90:Aktienfonds Lateinamerika:10_100:Aktienfonds Nordamerika:10_110:Aktienfonds Osteuropa:10_120:Aktienfonds Welt:10_400:Aktienfonds Afrika:10_410:Aktienfonds Mittlerer Osten:10_420:Aktienfonds Nordeuropa:20_130:Dachfonds Chance Plus:20_140:Dachfonds Chance:20_150:Dachfonds Ertrag Plus:20_160:Dachfonds Ertrag:20_170:Dachfonds Wachstum:20_180:Dachfonds laufzeitbegrenzt:30_430:Garantiefonds:40_200:Geldmarktfonds:40_210:Geldmarktnahe Fonds:50_220:Alternative Investmentfonds Hedgefonds:50_230:Alternative Investmentfonds Private Equity:50_240:Alternative Investmentfonds Rohstofffonds:60_250:Sonderkonzepte Absolute-/Total-Returnstrategiefonds:60_260:Sonderkonzepte Altersvorsorgefonds:60_270:Sonderkonzepte Institutionelle Fondskonzepte:60_280:Sonderkonzepte Steuerorientierte Fonds:70_30:Immobilienfonds Deutschland:70_70:Immobilienfonds Europa:70_120:Immobilienfonds Welt:80_50:Mischfonds Euroland:80_290:Mischfonds ausgewogen:80_300:Mischfonds dynamisch:80_310:Mischfonds flexibel:80_320:Mischfonds konservativ:90_330:Rentenfonds Inflationsindexierte Anleihen:90_340:Rentenfonds Laufzeitfonds:90_350:Rentenfonds MBS:90_360:Rentenfonds Nachranganleihen:90_370:Rentenfonds Staatsanleihen:90_380:Rentenfonds Unternehmensanleihen:90_390:Rentenfonds Wandelanleihen'DIDDIS:52:1:3+1+1+1+DKDOF;2:DKDFO;2'DIDFOS:53:2:3+1+1+1'DIDFPS:54:2:3+1+1+1'DIDPFS:55:2:3+1+1+1'DIDFES:56:2:3+1+1+1'DIDEFS:57:2:3+1+1+1'DIDOFS:58:2:3+1+1+1'DIFAFS:59:2:3+1+1+1+N:N'DIGBAS:60:1:3+1+1+1'DIGBSS:61:1:3+1+1+1+J'DIKAUS:62:3:3+1+1+1+N'DIKKAS:63:2:3+1+1+1+N:N:2'DIKKSS:64:3:3+1+1+1'DIKKUS:65:2:3+1+1+1+90:N:J'DIKSBS:66:1:3+3+1+1+J'DIKSPS:67:1:3+3+1+1+;:sepade.pain.001.002.03.xsd:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.003.03:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.001.03'DIPAES:68:1:3+1+1'DIPSAS:69:1:3+1+1'DIPSPS:70:1:3+1+1'DIQUOS:71:1:3+1+1+1'DIQUTS:72:1:3+1+1+1'DITLAS:73:1:3+1+1'DITLFS:74:1:3+1+1+N'DITLFS:75:2:3+1+1+N'DITSPS:76:1:3+1+1+N'DIVVDS:77:1:3+3+1+1'DIVVUS:78:1:3+3+1+1+N:J'DIWAPS:79:1:3+1+1+J:STOP;SLOS;LMTO;MAKT:J:J:GDAY;GTMO;GTHD:J:1:N:N:N:9999999,99:EUR'DIWAPS:80:4:3+1+1+1+J:STOP;STLI;LMTO;MAKT;OCOO;TRST:J:J:J:J:J:GDAY;GTMO;GTHD:J:1:N:N:N:9999999,99:EUR'DIWDGS:81:1:3+1+1+1+J:N:N'DIWGVS:82:1:3+1+1+1+J:730:N'DIWLVS:83:1:3+1+1+1+J:365:N'DINZPS:84:3:3+1+1+1+N:N:4:N:N:::N:J'DIFOPS:85:3:3+1+1+1+N:4:N:N:N::::MAKT:N:J'DIFPOS:86:3:3+1+1+1+N:4:N:N:::N:J'DIWOPS:87:5:3+1+1+1+0:N:4:N:N::::9999999,99:EUR:STOP;STLI;LMTO;MAKT;OCOO;TRST:BUYI;SELL;AUCT;CONT;ALNO;DIHA:GDAY;GTMO;GTHD;GTCA;IOCA;OPEN;CLOS;FIKI:N:J'DIWVBS:88:1:3+1+1+1+N:N'DIZDFS:89:2:3+1+1+1'DIZDLS:90:2:3+1+1+1'HIAUBS:91:5:3+1+1+1'HIBMES:92:1:3+1+1+1+2:28:2:28:1000:J:N'HIBSES:93:1:3+1+1+1+2:28:2:28'HICAZS:94:1:3+1+1+1+450:N:N:urn?:iso?:std?:iso?:20022?:tech?:xsd?:camt.052.001.02'HICCMS:95:1:3+1+1+1+1000:J:N'HICCSS:96:1:3+1+1+1'HICDBS:97:1:3+3+1+1+N'HICDES:98:1:3+3+1+1+4:0:9999:0102030612:01020304050607080910111213141516171819202122232425262728293099'HICDLS:99:1:3+3+1+1+0:9999:J:J'HICDNS:100:1:3+3+1+1+0:0:9999:J:J:J:J:J:N:J:J:J:0102030612:01020304050607080910111213141516171819202122232425262728293099'HICDUS:101:1:3+3+1+1+1:0:9999:1:N:N'HICMBS:102:1:3+1+1+1+N:J'HICMES:103:1:3+1+1+1+1:360:1000:J:N'HICMLS:104:1:3+1+1+1'HICSAS:105:1:3+1+1+1+1:360'HICSBS:106:1:3+1+1+1+N:J'HICSES:107:1:3+1+1+1+1:360'HICSLS:108:1:3+1+1+1+J'HICUBS:109:1:3+3+1+1+J'HICUMS:110:1:3+3+1+1+;:sepade.pain.001.002.03.xsd:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.003.03:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.001.03'HIDMCS:111:1:3+1+1+1+1000:J:N:2:28:2:28::urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.008.003.02'HIDMES:112:1:3+1+1+1+2:28:2:28:1000:J:N'HIDSBS:113:1:3+3+1+1+J:J:56'HIDSCS:114:1:3+1+1+1+2:28:2:28::urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.008.003.02'HIDSES:115:1:3+1+1+1+2:28:2:28'HIDSWS:116:1:3+1+1+1+N'HIEKAS:117:2:3+1+1+1+J:J:N:1'HIEKAS:118:3:3+1+1+1+J:J:N:1'HIEKPS:119:1:3+1+1+1+J:J:N'HIFGBS:120:2:3+3+1'HIFGBS:121:3:3+3+1'HIFRDS:122:1:3+1+1'HIFRDS:123:4:3+1+1+1+N:J:N:0:Kreditinstitut:1:DekaBank'HIKAZS:124:4:3+1+1+360:J'HIKAZS:125:5:3+1+1+360:J:N'HIKDMS:126:2:3+3+0+2048'HIKDMS:127:3:3+3+0+2048'HIKDMS:128:4:3+3+0+2048'HIKIFS:129:1:3+1+1'HIKIFS:130:4:3+1+1+1+J:J'HIKIFS:131:5:3+1+1+1+J:J'HIKIFS:132:6:3+1+1+1+J:J'HIMTAS:133:1:3+1+1+1+N'HIMTAS:134:2:3+1+1+1+N:J'HIMTFS:135:1:3+1+1+1'HIMTRS:136:1:3+1+1+1+N'HIMTRS:137:2:3+1+1+1+N:J'HINEAS:138:1:3+1+1+1:2:3:4'HINEZS:139:3:3+1+1+1+N:N:4:N:N:::N:J'HIWFOS:140:3:3+1+1+1+N:4:N:N:N::::MAKT:N:J'HIWPOS:141:5:3+1+1+1+0:N:4:N:N::::9999999,99:EUR:STOP;STLI;LMTO;MAKT;OCOO;TRST:BUYI;SELL;AUCT;CONT;ALNO;DIHA:GDAY;GTMO;GTHD;GTCA;IOCA;OPEN;CLOS;FIKI:N:J'HIWSDS:142:5:3+3+1+1+J:A;Inland DAX:B;Inland Sonstige:C;Ausland Europa:D;Ausland Sonstige'HIFPOS:143:3:3+1+1+1+N:4:N:N:::N:J'HIPAES:144:1:3+1+1+1'HIPPDS:145:1:3+1+1+1+1:Telekom:Xtra-Card:N:::15;30;50:2:Vodafone:CallYa:N:::15;25;50:3:E-Plus:Free and easy:N:::15;20;30:4:O2:Loop:N:::15;20;30:5:congstar:congstar:N:::15;30;50:6:blau:blau:N:::15;20;30:8:o.tel.o:o.tel.o:N:::9;19;29:9:SIM Guthaben:SIM Guthaben:N:::15;30;50'HIQTGS:146:1:3+1+1+1'HISALS:147:3:3+1+1'HISALS:148:4:3+1+1'HISALS:149:5:3+1+1'HISPAS:150:1:3+1+1+1+J:N:N:sepade.pain.001.002.03.xsd:sepade.pain.008.002.02.xsd:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.003.03:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.008.003.02:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.001.03:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.008.001.02'HISPAS:151:2:3+1+1+1+J:N:N:N:sepade.pain.001.002.03.xsd:sepade.pain.008.002.02.xsd:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.003.03:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.008.003.02:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.001.03:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.008.001.02'HIIPES:152:1:3+1+1+1+0:5:360:1000:J:;:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.001.03:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.001.08'HIIPMS:153:1:3+1+1+1+1000:J:;:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.001.001.03'HIISSS:154:1:3+1+1+1+5:urn?:iso?:std?:iso?:20022?:tech?:xsd?:pain.002.001.03'HITABS:155:2:3+1+1+1'HITABS:156:3:3+1+1+1'HITABS:157:4:3+1+1+1'HITAUS:158:1:3+1+1+1+N:N:J'HITAZS:159:1:3+1+1+1'HITAZS:160:2:3+1+1+1'HITMLS:161:1:3+1+1+1'HITSYS:162:1:3+1+1+1+N:N'HIWDUS:163:4:3+3+1+999'HIWFPS:164:2:3+3+1+RENTEN:INVESTMENTFONDS:GENUSSSCHEINE:SPARBRIEFE:UNTERNEHMENSANLEIHEN:EMERGING MARKET ANLEIHEN:STRUKTURIERTE ANLEIHEN:ZERTIFIKATE:AKTIEN:OPTIONSSCHEINE:ALLE ANGEBOTE EIGENES INSTITUT:ALLE ANGEBOTE UEBERGEORD. INSTITUTE'HIWOAS:165:2:3+1+1+J:STOP;SLOS;LMTO;MAKT:J:J:GDAY;GTMO;GTHD:J:1:N:N:N:9999999,99:EUR'HIWOAS:166:4:3+1+1+1+J:STOP;STLI;LMTO;MAKT;OCOO;TRST:J:J:J:J:J:GDAY;GTMO;GTHD:J:1:N:N:N:9999999,99:EUR'HIWPDS:167:5:3+1+1+J:N:N'HIWPRS:168:1:3+3+1+J:J:N:N::Aktien:Festverzinsliche Wertpapiere:Fonds:Fremdw�hrungsanleihen:Genussscheine:Indexzertifikate:Optionsscheine:Wandel- und Optionsanleihen cum'HIWPSS:169:1:3+3+1+J'HIWSOS:170:4:3+3+1+1+J:J:90:1:2:3:4:5:6:7:8:9:10:11'HIWSOS:171:5:3+3+1+1+J:J:90:1:2:3:4:5:6:7:8:9:10:11:12:13:14:15:16:17'HITANS:172:6:3+1+1+1+J:N:0:910:2:HHD1.3.0:::chipTAN manuell:6:1:TAN-Nummer:3:J:2:N:0:0:N:N:00:0:N:1:911:2:HHD1.3.2OPT:HHDOPT1:1.3.2:chipTAN optisch:6:1:TAN-Nummer:3:J:2:N:0:0:N:N:00:0:N:1:912:2:HHD1.3.2USB:HHDUSB1:1.3.2:chipTAN-USB:6:1:TAN-Nummer:3:J:2:N:0:0:N:N:00:0:N:1:913:2:Q1S:Secoder_UC:1.2.0:chipTAN-QR:6:1:TAN-Nummer:3:J:2:N:0:0:N:N:00:0:N:1:920:2:smsTAN:::smsTAN:6:1:TAN-Nummer:3:J:2:N:0:0:N:N:00:2:N:5:921:2:pushTAN:::pushTAN:6:1:TAN-Nummer:3:J:2:N:0:0:N:N:00:2:N:2:900:2:iTAN:::iTAN:6:1:TAN-Nummer:3:J:2:N:0:0:N:N:00:0:N:0'HITANS:173:7:3+1+1+1+N:N:0:922:2:pushTAN-dec:Decoupled::pushTAN 2.0:::Aufforderung:2048:J:2:N:0:0:N:N:00:2:N:2:180:1:1:J:J'HIPINS:174:1:3+1+1+0+5:38:6:USERID:CUSTID:HKCSU:J:HKPKB:N:HKPKA:J:HKPCR:N:HKPWE:J:HKPWL:N:HKPWB:N:HKPWA:J:HKBMB:N:HKDML:J:HKBML:J:HKDMB:N:HKIPZ:J:HKIPS:N:DKWOK:N:DKWDH:N:DKBVE:J:DKPTZ:N:DKEEA:N:DKALE:J:DKALL:J:DKALN:J:DKANA:J:DKANL:J:DKBAZ:N:DKBKD:N:DKBKU:N:DKBUM:N:DKBVA:J:DKBVB:J:DKBVD:N:DKBVK:N:DKBVP:J:DKBVR:J:DKBVS:N:DKDFA:N:DKDFB:N:DKDFC:J:DKDFD:N:DKDFL:J:DKDFU:N:DKDIH:J:DKDFS:N:DKDDI:N:DKDFO:J:DKDFP:J:DKDPF:N:DKDFE:J:DKDEF:N:DKDOF:N:DKFAF:N:DKGBA:J:DKGBS:J:DKKAU:N:DKKKA:N:DKKKS:N:DKKKU:N:DKKSB:N:DKKSP:J:DKPAE:N:DKPSA:J:DKPSP:N:DKQUO:N:DKQUT:N:DKTLA:N:DKTLF:J:DKTSP:N:DKVVD:N:DKVVU:N:DKWAP:N:DKWDG:N:DKWGV:N:DKWLV:N:DKNZP:N:DKFOP:N:DKFPO:N:DKWOP:N:DKWVB:N:DKZDF:J:DKZDL:J:HKAUB:J:HKBME:J:HKBSE:J:HKCAZ:J:HKCCM:J:HKCCS:J:HKCDB:N:HKCDE:J:HKCDL:J:HKCDN:J:HKCDU:J:HKCMB:N:HKCME:J:HKCML:J:HKCSA:J:HKCSB:N:HKCSE:J:HKCSL:J:HKCUB:N:HKCUM:J:HKDMC:J:HKDME:J:HKDSB:N:HKDSC:J:HKDSE:J:HKDSW:J:HKEKA:N:HKEKP:N:HKFGB:N:HKFRD:N:HKKAZ:J:HKKDM:J:HKKIF:J:HKMTA:J:HKMTF:N:HKMTR:J:HKNEA:N:HKNEZ:J:HKWFO:J:HKWPO:J:HKWSD:N:HKFPO:J:HKPAE:J:HKPPD:J:HKQTG:N:HKSAL:J:HKSPA:N:HKIPE:J:HKIPM:J:HKISS:N:HKTAB:N:HKTAU:N:HKTAZ:N:HKTML:N:HKTSY:N:HKWDU:N:HKWFP:N:HKWOA:J:HKWPD:N:HKWPR:N:HKWPS:J:HKWSO:N:HKTAN:N'HITAN:175:6:4+4++noref+nochallenge'HNHBS:176:1+1'";
    const ANONYMOUS_END_REQUEST = "HNHBK:1:3+000000000113+300+993293908577=281256812352BRKW=+2'HKEND:2:1+993293908577=281256812352BRKW='HNHBS:3:1+2'";
    const ANONYMOUS_END_RESPONSE = "HNHBK:1:3+000000000171+300+993293908577=281256812352BRKW=+2+993293908577=281256812352BRKW=:2'HIRMG:2:2+0010::Nachricht entgegengenommen.+0100::Dialog beendet.'HNHBS:3:1+2'";
}
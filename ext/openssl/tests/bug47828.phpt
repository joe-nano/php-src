--TEST--
Bug #47828 (segfaults when a UTF-8 conversion fails openssl_x509_parse())
--SKIPIF--
<?php if (!extension_loaded("openssl")) die("skip"); ?>
--FILE--
<?php
$csr = "-----BEGIN CERTIFICATE-----
MIIEKzCCAxOgAwIBAgICAtUwDQYJKoZIhvcNAQEFBQAwgewxFjAUBgNVBC0DDQBT
UFI5NjEyMTdOSzkxETAPBgNVBAcTCENveW9hY+FuMQswCQYDVQQIEwJERjELMAkG
A1UEBhMCTVgxDjAMBgNVBBETBTA0MDAwMR8wHQYDVQQJExZQYW56YWNvbGEgIzYy
IDFlciBwaXNvMSgwJgYDVQQDEx9BdXRvcmlkYWQgY2VydGlmaWNhZG9yYSBJbnRl
cm5hMRMwEQYDVQQLEwpUZWNub2xvZ+1hMRMwEQYDVQQKEwpTZWd1cmlEYXRhMSAw
HgYJKoZIhvcNAQkBFhFhY0BzZWd1cmlkYXRhLmNvbTAeFw0wNzAyMTIwMDAwMDBa
Fw0xMjAyMjkwMDAwMDBaMIIBDDEWMBQGA1UELQMNAFNQUjk2MTIxN05LOTEXMBUG
A1UEBxMOQWx2YXJvIE9icmVnb24xDTALBgNVBAgTBEQuRi4xCzAJBgNVBAYTAk1Y
MQ4wDAYDVQQREwUwMTAwMDEoMCYGA1UECRMfSW5zdXJnZW50ZXMgU3VyIDIzNzUs
IDNlci4gUGlzbzEbMBkGA1UEAxMSd3d3LnNlZ3VyaWRhdGEuY29tMREwDwYDVQQL
EwhJbnRlcm5ldDEpMCcGA1UEChMgU2VndXJpRGF0YSBQcml2YWRhLCBTLkEuIGRl
IEMuVi4xKDAmBgkqhkiG9w0BCQEWGXBvc3RtYXN0ZXJAc2VndXJpZGF0YS5jb20w
gZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBANG/rb52Ou//dnkHysR5m7T4r8QM
KOM/CP0OEXTOC+a+47RsZjqNiZsBkSeR92OFPpkw5bJ85IAD/Tgx7Tli3ryJfrdk
WMfkXpzWW0YmeTrghL0DMNd8nYc9voVv+OGnIZ0W4Mhz31eiThmyy7Fs8ZlFyfkR
REj5OQvq+z+NP/n/AgMBAAGjODA2MBMGA1UdJQQMMAoGCCsGAQUFBwMBMAwGA1Ud
DwQFAwMH6AAwEQYJYIZIAYb4QgEBBAQDAgBAMA0GCSqGSIb3DQEBBQUAA4IBAQCq
nBqQEb7H6Gxi4KXBn1lrPd5KWO40iSD7BREU8e0eI1ZLZvi4IEAlmyG81Le037jo
irMUDS2Ue5WI61QnGw4LhnYlCIuffU7fTs+UbrOE4qNU67G+XBfjk0gHkXHmEYbb
EOR9OHeDcYFgcl3j4SLg/ff6oRYbMkQRCrgQzrl/MNkuqDWJrcigS9OD6OTgRyEo
7Zvf7/ofWIzTIvINbfjQzSTr8AbI4SbuU9iKgVGDQQF6cfpBmOYgnr3QPuoTQCoU
pz9H9wBlz/Nmw12YtfCmGqpIFAxpRGFQTGPNJWr4FdZkUM792lm7Sf3zzSvi8Ruz
M3dwifRsZyZyruy4tMsu
-----END CERTIFICATE-----
";
$cert = str_replace("\\n", "\n", $csr);
$arr = openssl_x509_parse($cert);
var_dump($arr['hash']);
echo "Done";
?>
--EXPECT--
string(8) "9337ed77"
Done

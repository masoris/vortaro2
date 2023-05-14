#!/usr/bin/perl
use strict;
$_='
    @I
   NC=s
   plit           (/
  /,uc(           $AR
  GV[0           ]));o
 pen(            DATA,"
 <$0"             );und
 ef$/            ;$_=<D
 ATA>;$_=~s/(.*)GGG/GG
  G/gsm;$/="\n";forea
  ch$_(keys%ENV){del
  ete$ENV{$_};}for
   each(@_=  sp
    lit(/\./,
     $_)){@AR
    GV=split(/$
   "/)unless($_Zeq
  Z1);$A RGV[1]=~s/\
  s//Zif($ARGV[1]);$A
  RGV[0]=~s/\s//Zif($A
  RGV        [0]);$_=r
  and          ;nextZi
  f$_        >0.5and$
  ARGV      [1]andZe
   xists    $ENV{
   $ARGV[1]};$
    ENV{$ARGV
     [1]}=$AR
    GV[0]if($AR
   GV[0]and$ARGV[1
   ]);}   @ARGV=();f
   oreach(@INC){push(
   @ARGV,Z$EN  V{$_})
   ;}f            ore
   ach    ("@ARGV"x
   3)Z{ @_=split
    (//,$_);fo
     reach(@
     _){$^O=
    $"x75;if($
    _Zn  eZ$"){su
   bst     r($^O,sin
   (++       $a/8)*32
   +32,1)=$_;tr/ATGC/
   TACG/;substr($^O
    ,sin($a/4)*
    14+32,1)
     =$_;pri
      nt"$^O
       $/";sel
         ectZ$b,$b
           ,$b,0.0
              5;}}}';
$_=~s/\s//gm;$_=~s/Z/$"/gm;eval $_;exit;
GGG G.GGA G.GGC G.GGT G.GAG E.GAA E.GAC D.GAT D.GCG A.
GCA A.GCC A.GCT A.GTG V.GTA V.GTC V.GTT V.AGG R.AGA R.
AGC S.AGT S.AAG K.AAA K.AAC N.AAT N.ACG T.ACA T.ACC T.
ACT T.ATG M.ATA I.ATC I.ATT I.CGG R.CGA R.CGC R.CGT R.
CAG Q.CAA Q.CAC H.CAT H.CCG P.CCA P.CCC P.CCT P.CTG L.
CTA L.CTC L.CTT L.TGG W.TGC C.TGT C.TAC Y.TAT Y.TCG S.
TCA S.TCC S.TCT S.TTG L.TTA L.TTC F.TTT F.XXX O.TGA U.
TAG B.TAA Z.
1


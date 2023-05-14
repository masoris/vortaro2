#!/bin/env python
# -*- encoding: utf-8 -*-

import commands, os, json, time, sys

import sys; reload(sys); sys.setdefaultencoding('utf-8')
def DEBUG_PRINT(str_line):
#{
    import inspect
    print "(%s,%d) %s" % (__file__[__file__.rfind('/')+1:], inspect.stack()[1][2], str_line.strip())
#}

def find_root(vorto):
#{
    if vorto[-1] == "o":
        return vorto[0:-1] + "-o"

    if vorto[-1] == "i":
        return vorto[0:-1] + "-i"

    if vorto[-1] == "e":
        return vorto[0:-1] + "-e"

    if vorto[-1] == "a":
        return vorto[0:-1] + "-a"

    if vorto[-1] == "u":
        return vorto[0:-1] + "-u"

    return vorto
#}

fp = open("./v.txt", "r")
for line in fp.xreadlines():
    # print line
    row = line.strip().split(" ", 1)
    # print row
    head = row[0]
    first = ''
    rest = ''
    for ch in head:
        if rest != '':
            rest += ch
        elif ch == '[':
            rest += ch
        elif ord(ch) < 127:
            first += ch
        elif ch in "ĈĜĴĤŬŜŝĵĉĝŭĥŝ":
            first += ch
        else:
            rest += ch

    if first == "":
        continue

    first = find_root(first)
    if len(row) >= 2:
        rest += row[1]

    rest = rest.replace("'", " ").replace("\"", " ")

    print "\"%s\t\t%s\"," % (first, rest)

fp.close()

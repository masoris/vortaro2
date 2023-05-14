#!/bin/env python
# -*- coding: utf-8 -*-

import sys
import re
from HTMLParser import HTMLParser

# 한글 인코딩 문제가 없도록 다음 두줄을 넣는다.
reload(sys)
sys.setdefaultencoding('utf-8')

def process_line(line):
#{
    if line[0:3] != '<p ':
        return

    parser = HTMLParser()

    line = line.replace("</b>", "\t")
    line = re.sub(r"<[^\>]+>", "", line)

    line = line.strip()

    line = line.replace("(	", "(")

    if line.find("\t") < 0:
        return

    n = len(line)
    for i in range(0, n):
        if i < n-2 and line[i:i+1] == '&' and line[i:i+1] == '#':
            num = ''
            found = False
            for j in range(0, 6):
                if '0' < line[j+i+2:j+i+3] and line[j+i+2:j+i+3] < '9':
                    num += line[j+i+2:j+i+3]
                    continue
                if line[j+i+2:j+i+3] == ';':
                    found = True
                    break
            if found:
                i = i+3+len(num)
                print num

    # print line
#}

def process_file(filename):
#{
    f = open(filename, "r")

    longline = ''

    for line in f.xreadlines():
        line = line.strip()
        if line == '':
            # print longline
            process_line(longline)
            longline = ''
        else:
            longline += line

    f.close()
#}


process_file("./xx")

#!/bin/env python
# -*- coding: utf-8 -*-

import sys
reload(sys)
sys.setdefaultencoding('utf-8')

if __name__ == "__main__":
#{
    if len(sys.argv) < 2:
        print "Usage: %s input output" % (sys.argv[0])
        sys.exit(0)

    ifile = sys.argv[1]
    ofile = sys.argv[2]

    ifp = open(ifile, "r")
    ofp = open(ofile, "w+")

    ofp.write("[\n");
    for line in ifp.xreadlines():
        line = line.strip()

        kv = line.split(" ", 1)

        if len(kv) < 2:
            continue

        kv[0] = kv[0].replace("|", "-")
        if kv[0].lower() != kv[0]:
            kv[1] += " " + kv[0].lower()
       
        ofp.write("\"%s\t\t%s\",\n" % (kv[0], kv[1]))
    ofp.write("];\n");
    ifp.close()
    ofp.close()
#}

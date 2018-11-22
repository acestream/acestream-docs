# Minimal makefile for Sphinx documentation
#

# You can set these variables from the command line.
SPHINXOPTS    =
SPHINXBUILD   = sphinx-build
SPHINXPROJ    = AceStream
SOURCEDIR     = .
BUILDDIR      = _build

# Put it first so that "make" without argument is like "make help".
help:
	@$(SPHINXBUILD) -M help "$(SOURCEDIR)" "$(BUILDDIR)" $(SPHINXOPTS) $(O)

copy:
	mkdir -p ./changelog/ace-script/
	mkdir -p ./changelog/userscript-p2p-search/
	mkdir -p ./changelog/userscript-magicplayer/
	cp /home/anton/src/ace-script/CHANGELOG.rst ./changelog/ace-script/
	cp /home/anton/src/userscript-p2p-search/CHANGELOG.rst ./changelog/userscript-p2p-search/
	cp /home/anton/src/userscript-magicplayer/CHANGELOG.rst ./changelog/userscript-magicplayer/

.PHONY: help Makefile

# Catch-all target: route all unknown targets to Sphinx using the new
# "make mode" option.  $(O) is meant as a shortcut for $(SPHINXOPTS).
%: Makefile copy
	@$(SPHINXBUILD) -M $@ "$(SOURCEDIR)" "$(BUILDDIR)" $(SPHINXOPTS) $(O)
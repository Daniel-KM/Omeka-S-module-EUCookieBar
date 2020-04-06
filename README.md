EUCookieBar (module for Omeka S)
================================

[EUCookieBar] is a module for [Omeka S] that adds a European Union warning about
cookies and private life, if you use Google analytics, Facebook buttons, or your
own tools to steal personal data of your visitors.

It provides the same feature than [plugin EUCookieBar] for [Omeka Classic] and
use the [jQuery cookiebar widget] too.


Installation
------------

This module requires the library [eucookiebar], that is currently provided with
the module. It requires the library [jQuery] in the theme, generally enabled by default.

See general end user documentation for [installing a module].

* From the zip

Download the last release [EUCookieBar.zip] from the list of releases, and
uncompress it in the `modules` directory.

* From the source and for development

If the module was installed from the source, rename the name of the folder of
the module to `EUCookieBar`.


Quick start
-----------

Each site can enable the bar independantly. The message to display should be set
in site settings. If no message is set, the cookie bar is not enabled on the
site. Options can be set too as json. See the included library for more options.


Warning
-------

Use it at your own risk.

It’s always recommended to backup your files and your databases and to check
your archives regularly so you can roll back if needed.


Troubleshooting
---------------

See online issues on the [module issues] page on GitHub.


License
-------

### Module

This module is published under the [CeCILL v2.1] licence, compatible with
[GNU/GPL] and approved by [FSF] and [OSI].

This software is governed by the CeCILL license under French law and abiding by
the rules of distribution of free software. You can use, modify and/ or
redistribute the software under the terms of the CeCILL license as circulated by
CEA, CNRS and INRIA at the following URL "http://www.cecill.info".

As a counterpart to the access to the source code and rights to copy, modify and
redistribute granted by the license, users are provided only with a limited
warranty and the software’s author, the holder of the economic rights, and the
successive licensors have only limited liability.

In this respect, the user’s attention is drawn to the risks associated with
loading, using, modifying and/or developing or reproducing the software by the
user in light of its specific status of free software, that may mean that it is
complicated to manipulate, and that also therefore means that it is reserved for
developers and experienced professionals having in-depth computer knowledge.
Users are therefore encouraged to load and test the software’s suitability as
regards their requirements in conditions enabling the security of their systems
and/or data to be ensured and, more generally, to use and operate it in the same
conditions as regards security.

The fact that you are presently reading this means that you have had knowledge
of the CeCILL license and that you accept its terms.

### Library

The library EUCookieBar is licensed under the [Creative Commons Attribution 3.0 Unported License].


Copyright
---------

* Copyright 2012 PrimeBox (info@primebox.co.uk) (for the library)
* Copyright Daniel Berthereau, 2020 (see [Daniel-KM] on GitHub)


[EUCookieBar]: https://github.com/Daniel-KM/Omeka-S-module-EUCookieBar
[Omeka S]: https://omeka.org/s
[Omeka Classic]: https://omeka.org/classic
[jQuery cookiebar widget]: http://www.primebox.co.uk/projects/cookie-bar/
[plugin EUCookieBar]: https://github.com/digihum/omeka-plugin-eucookiebar
[EUCookieBar.zip]: https://github.com/Daniel-KM/Omeka-S-module-EUCookieBar/releases
[installing a module]: http://dev.omeka.org/docs/s/user-manual/modules/#installing-modules
[jQuery]: https://jquery.org
[module issues]: https://github.com/Daniel-KM/Omeka-S-module-EUCookieBar/issues
[CeCILL v2.1]: https://www.cecill.info/licences/Licence_CeCILL_V2.1-en.html
[GNU/GPL]: https://www.gnu.org/licenses/gpl-3.0.html
[FSF]: https://www.fsf.org
[OSI]: http://opensource.org
[Creative Commons Attribution 3.0 Unported License]: http://creativecommons.org/licenses/by/3.0/
[Daniel-KM]: https://github.com/Daniel-KM "Daniel Berthereau"

u:Gem::Specification�[I"1.8.23:ETiI"unicorn; TU:Gem::Version[I"
4.8.2; TIu:	Time���    :@_zoneI"UTC; TI"/Rack HTTP server for fast clients and Unix; TU:Gem::Requirement[[[I">=; TU;[I"0; TU;	[[[I">=; TU;[I"0; TI"	ruby; F[
o:Gem::Dependency
:
@name"	rack:@requirementU;	[[[I">=; TU;[I"0; T:
@type:runtime:@prereleaseF:@version_requirementsU;	[[[I">=; TU;[I"0; To;

;"	kgio;U;	[[["~>U;["2.6;;;F;U;	[[["~>U;["2.6o;

;"raindrops;U;	[[["~>U;["0.7;;;F;U;	[[["~>U;["0.7o;

;"isolate;U;	[[["~>U;["3.2;:development;F;U;	[[["~>U;["3.2o;

;"wrongdoc;U;	[[["~>U;["
1.6.1;;;F;U;	[[["~>U;["
1.6.1"mongrel""mongrel-unicorn@rubyforge.org[I"Unicorn hackers; TI"[\Unicorn is an HTTP server for Rack applications designed to only serve
fast clients on low-latency, high-bandwidth connections and take
advantage of features in Unix/Unix-like kernels.  Slow clients should
only be served by placing a reverse proxy capable of fully buffering
both the the request and response in between \Unicorn and slow clients.; TI"!http://unicorn.bogomips.org/; TT@["GPLv2+"Ruby 1.8
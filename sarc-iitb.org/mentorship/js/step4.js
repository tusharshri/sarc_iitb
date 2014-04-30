addOnload (checkChange);

function checkChange() {
	var preference = document.getElementById ("preference");
	preference.onchange = changeAreasOfinterest;
	
	var preferreddept = document.getElementById ("preferreddept");
	var areaofinterest = document.getElementById ("areaofinterest");
	
	var nontechnicalareas = new Array("Any","Accounting","Arts and Crafts","Banking Finance","Business Administration","Communications","Dance","Education Management","Enterpreneurship","Event Management","Fashion Designing","Film and Media","Finance","Government Administrations","Government Relations","Graphic Design","Hotel Management","Human Relations","International Affairs","International Business","Journalism","Law enforcement","Legal Services","Market research","Marketing and Advertising","Music","Operations","Real Estate","Risk Mangement and Insurance","Sports","Systems","Visual Arts","Writing and Editing","Others");
	
	var areasofinterest = new Array();
	areasofinterest["Aerospace Engineering"] = new Array("Aerodynamics","Propulsion","Controls","Structures","Systems Design and Engineering","Integrated Modeling and Simulation");
	areasofinterest["School of Bioscience"] = new Array("Bioinstrumentation for Diagnostics and Therapeutics","Bionanotechnology","Controlled Drug Delivery Systems","Neurophysiology","Physiological System Modelling and Analysis","Biomaterials and Tissue Engineering","Prostheses","Medical Devices");
	areasofinterest["Chemical Engineering"] = new Array("Process Modelling	Simulation","Computer Aided Design","Optimization and Control","Particulate Systems","Fluid Mechanics","Separation Process","Petrochemical","Electrochemical Processes","Thermodynamics","Colloid & Interfacial Science","Microstructure Engineering","Supercritical Fluid Extraction","Membrane Processes","Environmental Engineering","Bioprocess Engineering and Food Engineering","Control System Synthesis and Design","Distillation, Adsorption, Piping Engineering","Hazard Analysis and Management","Energy Integration");
	areasofinterest["Chemistry"] = new Array("Biophysical Chemistry","Coordination Chemistry","Bio-Inorganic Chemistry","Organometallic Chemistry","Bio-organic Chemistry","Chemistry of Natural Products","Synthetic Organic Chemistry","Photochemistry","Polymer Chemistry","Thermodynamics","Electrochemistry","Solid State Chemistry and Physics","Catalysis","Theoretical Chemistry","Theoretical/Computational Chemistry","Statistical Mechanics","Homogeneous/Heterogeneous Catalysis","Chemical Dynamics");
	areasofinterest["Civil Engineering"] = new Array("Transportation Systems Engineering","Geotechnical Engineering","Structural Engineering and Safety","Water Resources","Remote Sensing","Computational Mechanics","Disaster Risk Management","Environmental Geotechnology","Geosynthetics and Ground Improvement","Remote Sensing, GIS and GPS studies","Traffic Engineering and Management","Transportation and Infrastructure Systems Engineering","Surface and Ground Water Management Systems","Pavement Systems Design","Numerical and Centrifuge Modeling Geotechnical Problems","Surveying and Geodesy","Transportation and Infrastructure and System Engineering");
	areasofinterest["Computer Science and Engineering"] = new Array("Cloud Computing","Compilers","Database","Distributed Systems","Electronics/Microprocessors","Embedded Systems","Formal Verifications","Machine Learning/Data Mining","Natural Language Processing","Networks","Software Engineering","Digital Image Processing","Interface Logic Verification");
	areasofinterest["Earth Sciences"] = new Array("Geochemistry","Structural Geology","Petrology","Hydrogeology","Sedimentology","Micropaleontology","Stratigraphy","Ore Petrology","Geostatistics and Ore Deposit Modeling","Rock Magnetism","Marine Geology","Seismology and Geothermics");
	areasofinterest["Electrical Engineering"] = new Array("Communication and Signal Processing","Control and Computing","Power Electronics & Power Systems","Micro Electronics","Electronic Systems","Optical and Microwave");
	areasofinterest["Humanities and Social Sciences"] = new Array("Human Resource Management","Health and Stress Management","Gender and ICT","Paninian Grammar","Manuscriptology","Applied Philosophy","Theoretical and Applied Linguistics","Modern Literature and its Theories","Globalization","Sociology of Development","Trade","Development","Environmental Economics","Industry Finance","Computational Philosophy","Organisational Behaviour");
	areasofinterest["Energy Science and Engineering"] = new Array("Energy Efficiency/Improvements in Conventional Energy Systems","Petroleum Geology","Palaeontology","Process Integration for Resource Optimization","Pinch Analysis Development of Techniques for Optimization of Utility Systems","Demand Side Management/Load Management in the Power Sector","Variable Speed Drives","Power Generation and Systems Planning","Energy Management and Auditing	Efficient Motor Drive Systems","Electronics Ballasts Engineering","Static VAR compensators","Illumination control","Power electronics in energy efficient systems","Electric vehicles","Boilers and fludised bed combustion","Exhaust heat recovery","Cogeneration","Geostatics abd Geomodelling","Minerology","Geomagnetism and general Geophysics","Economic and Mining Geology","Seismology","Groundwater and Geothermics");
	areasofinterest["Mathematics"] = new Array("Algebra","Analysis","Combinatorics","Differential Equations","Fluid Mechanics","Numerical Analysis and Functional Analysis","Topology and Geometry","Number Theory","Probability","Statistics","Theoretical Computer Science");
	areasofinterest["Industrial Design Centre"] = new Array("Basic Design","Product Design","Product Semantics","Cognition and Imagery","Environment Design","Furniture Design","Exhibition Design","New Media Design,Internet,Multimedia Interaction Design","Design Management and Design Methods","Print Media","Typography","Graphic Design","Bamboo Craft Creativity","Workstation Ergonomics,Automobile and Product Ergonomics","Animation,Illustration","Indian Design Traditions","Human Computer Interaction");
	areasofinterest["Industrial Engineering Operations Research"] = new Array("Optimization: Models, theory and algorithms","Stochastic models","Stochastic control","Simulation Modeling and Analysis","Artificial Intelligence based methods","Game theory","Logistics and Transportation","Supply Chain Analysis and Inventory Planning","Financial Engineering","Optimization, Planning and Control in Manufacturing and Robotics","Scheduling and ERP");
	areasofinterest["Mechanical Engineering"] = new Array("Thermodynamics and Heat Transfer","Refrigeration and Air-Conditioning","Power Plant and I.C. Engine","Machine Tools and Tooling","CAD-CAM Robotics,Artificial Intelligence","Manufacturing Processes and Systems","MEMS","Machine Design and Dynamics","Solid Mechanics & Stress Analysis","Fluid Mechanics, CFD","Systems & Control");
	areasofinterest["Metallurgical Engineering and Material Science"] = new Array("Electronic Materials","Advanced Ceramics","Polymers/Composites","Biomaterials","Thin Films/Semiconductors","Nano Materials","Deformation Behaviour/Metal Forming","Failure and Fracture Mechanics","Modelling/Process Control","Phase Transformation","Microstructure","Texture/Electron","Microscopy","Metal Joining/Solidification","Powder Metallurgy/Powder Processing","Process Metallurgy","Surface Engineering/Corrosion");
	areasofinterest["Physics"] = new Array("Semiconductor Nanomaterials","Magnetism and Magnetic Materials","Nano Scale Physics","Thin Films and Multilayers","Superconductivity and Low Temperature Physics","Experimental, Laser Physics and Spectroscopy","Non-linear Optics","Experimental Nuclear Physics","Relativistic Heavy-ion Physics","Theoretical Nuclear Physics","Theoretical High Energy Physics","Theoretical Condensed Matter Physics","Quantum Computing","Statistical Physics","Non-Equilibrium Physics","Applications of Quantum Physics");
	areasofinterest["Engineering Physics"] = new Array("Semiconductor Nanomaterials","Magnetism and Magnetic Materials","Nano Scale Physics","Thin Films and Multilayers","Superconductivity and Low Temperature Physics","Experimental, Laser Physics and Spectroscopy","Non-linear Optics","Experimental Nuclear Physics","Relativistic Heavy-ion Physics","Theoretical Nuclear Physics","Theoretical High Energy Physics","Theoretical Condensed Matter Physics","Quantum Computing","Statistical Physics","Non-Equilibrium Physics","Applications of Quantum Physics");

	preferreddept.onchange = changeAreasOfinterestTechnical;
	changeAreasOfinterestTechnical();
	
	function changeAreasOfinterest() {
		if (preference.value == "Technical") {
			preferreddept.onchange = changeAreasOfinterestTechnical;
			changeAreasOfinterestTechnical();
			areaofinterest.onchange = null;
			removeOthersInput();
		}
		else {
			for (w in areaofinterest.options) {
				areaofinterest.options[w] = null;
			}
			i = 0;
			var areas = nontechnicalareas;
			for (x in areas){
				areaofinterest.options[i++] = new Option(areas[x],areas[x]);
			}
			areaofinterest.onchange = checkForOthers;
			preferreddept.onchange = null;
		}
	}
	
	function checkForOthers() {
		if (areaofinterest.value == "Others") {
			var othersinput = document.createElement("INPUT");
			othersinput.id = "others";
			othersinput.name = "others";
			var specify = document.createElement("DIV");
			specify.id = "specify";
			specify.appendChild(document.createTextNode("Specify: "));
			areaofinterest.parentNode.appendChild(specify);
			areaofinterest.parentNode.appendChild(othersinput);
		}
		else {
			removeOthersInput();
		}
	}
	
	function removeOthersInput () {
		if (othersinput = document.getElementById("others")) {
			othersinput.parentNode.removeChild(document.getElementById("specify"));
			othersinput.parentNode.removeChild(othersinput);
		}
	}
	
	function changeAreasOfinterestTechnical() {
		for (w in areaofinterest.options) {
			areaofinterest.options[w] = null;
		}
		if (preferreddept.value == "Any") {
			i = 0;
			for (x in areasofinterest) {
				var areas = areasofinterest[x];
				for(y in areas){
					areaofinterest.options[i++] = new Option(x + ": " + areas[y],x + ": " + areas[y]);
				}
			}
		}
		else {
			i = 1;
			var areas = areasofinterest[preferreddept.value];
            areaofinterest.options[0] = new Option('Any','Any');
			for (x in areas){
				areaofinterest.options[i++] = new Option(areas[x],areas[x]);
			}
		}
	}
}
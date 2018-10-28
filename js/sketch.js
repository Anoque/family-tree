var	array = [],
	members,
	sizeBlockX = 200;
	sizeBlockY = 40;
	tree = [],
	margin = 10,
	fontSize = 14,
	biasX = 0,
	biasY = 0,
	getMembersUrl = "http://localhost/tree/get",
	colorBox = [
		[65, 105, 225],
		[240, 128, 128]
	];

function setup() {
	createCanvas(document.body.clientWidth, document.body.clientHeight);
	frameRate(100);

	$.ajax({
		url: getMembersUrl,
		success: function(value) {
			members = JSON.parse(value);
			// noLoop();
			textSize(fontSize);
			var deleted = 0;
			
			for (var i = 0; i < members.length; i++) {
				if (members[i].parent_id == 0) {
					var level = 1;
					tree.push([]);
					setNewLevel(level, members[i]);
				}
			}

			for (var i = 0; i < tree.length; i++) {
				if (tree[i].length > 0) {
					var coords = getCoords(tree[i].length, i + 1);

					for (var j = 0; j < coords.length; j++) {
						tree[i][j].x = coords[j][0];
						tree[i][j].y = coords[j][1];
					}
				}
			}
		}
	});
}

function draw() {
	textAlign(CENTER);
	stroke(255);

	if (mouseIsPressed) {
		if (lastCoordX != mouseX || lastCoordY != mouseY) {
			biasX += mouseX - lastCoordX;
			biasY += mouseY - lastCoordY;
			clear();
		}
	}

	lastCoordX = mouseX;
	lastCoordY = mouseY;

	for (var i = 0; i < tree.length; i++) {
		for (var j = 0; j < tree[i].length; j++) {
			fill(colorBox[+tree[i][j].sex][0], colorBox[+tree[i][j].sex][1], colorBox[+tree[i][j].sex][2]);

			rect(tree[i][j].x + biasX, tree[i][j].y + biasY, sizeBlockX, sizeBlockY, 10);
			fill(255);
			text(tree[i][j].name, tree[i][j].x + sizeBlockX / 2 + biasX, tree[i][j].y + sizeBlockY / 2 + fontSize / 2 + biasY);
			
			if (tree[i][j].partner != null && tree[i][j].partner.length > 0) {
				stroke(255, 0, 0);
				fill(255);
				rect(tree[i][j].x + sizeBlockX - 5 + biasX, tree[i][j].y + biasY, sizeBlockX, sizeBlockY, 10);
				fill(0);
				noStroke();
				text(tree[i][j].partner, tree[i][j].x + sizeBlockX * 1.5 + biasX, tree[i][j].y + sizeBlockY / 2 + fontSize / 2 + biasY);
				stroke(255);
				line(tree[i][j].x + sizeBlockX + biasX, tree[i][j].y + sizeBlockY / 2 + biasY, tree[i][j].x + sizeBlockX - 5 + biasX, tree[i][j].y + sizeBlockY / 2 + biasY);
			}

			if (tree[i][j].hasChild) {
				var childs = getChilds(tree[i][j].id, i + 1, true);

				for (var k = 0; k < childs.length; k++) {
					line(tree[i][j].x + (sizeBlockX / 2) + biasX, tree[i][j].y + sizeBlockY + biasY, childs[k].x + (sizeBlockX / 2) + biasX, childs[k].y + biasY);
				}
			}
		}
	}
}

function setNewLevel(level, member) {
	if (tree.length < level && level > 1) {
		tree.push([]);
	}

	tree[level - 1].push(member);

	var childs = getChilds(member.id, 0, false);

	tree[level - 1][tree[level - 1].length - 1].hasChild = (childs.length > 0);

	for (var i = 0; i < childs.length; i++) {
		setNewLevel(level + 1, childs[i]);
	}
}

function getCoords(elements_count, level) {
	var step = sizeBlockX + 10;
	var result = [];

	for (var i = 0; i < elements_count; i++) {
		result.push([i * step + margin, level * sizeBlockY + (level * sizeBlockY)]);
	}

	return result;
}

function getChilds(id, index, isTree) {
	var items = (isTree) ? tree[+index] : members;

	return items.filter(function(value) {
		return value.parent_id == id;
	});
}

function biasParents(level, parent_id, childs_count) {
	for (var i = 0; i < tree[level - 1].length; i++) {
		if (tree[level - 1][i] == parent_id) {
			if (i > 0) {
				// 
			} else {
				// 
			}
		}
	}
}